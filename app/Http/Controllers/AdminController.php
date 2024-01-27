<?php

namespace App\Http\Controllers;

use App\Models\Adds;
use App\Models\Admins;
use App\Models\Categories;
use App\Models\gifs;
use App\Models\Settings;
use App\Models\siteUsers;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function fakeAdmin()
    {
        $new = new Admins;
        $new->email = "admin@gmail.com";
        $new->password = Hash::make(123456789);
        $new->save();
    }

    public function login()
    {
        $title = "Login";

        $data = compact("title");

        return view("admin.login")->with($data);
    }

    public function login_check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $check = Admins::where("email", $request->email)->first();

        if ($check) {


            if (Hash::check($request->password, $check->password)) {
                session()->put("admin_id", $check->id);

                return redirect()->route("admin.dashboard")->with("success", "Logged in successfully....");
            } else {
                return redirect()->route('admin.login')->with("error", "Please enter valid credentials....");
            }
        } else {
                return redirect()->route('admin.login')->with("error", "Please enter valid credentials....");
        }
    }

    public function logout()
    {
        session()->forget("admin_id");

        return redirect()->route("admin.login")->with("success", "Loggedout successfully...");
    }

    public function dashboard()
    {
        $title = "Dashboard";

        $gifs = gifs::all();

        $users = siteUsers::all();

        $data = compact("title", "gifs", "users");

        return view("admin.index")->with($data);
    }

    public function list_categories()
    {
        $title = "List Of Categories";

        $categories = Categories::latest("created_at")->with("gifs")->get();

        $data = compact("title", "categories");

        return view("admin.list-categories")->with($data);
    }

    public function add_category()
    {
        $title = "Create Category";

        $data = compact("title");

        return view("admin.add-category")->with($data);
    }

    public function store_category(Request $request)
    {
        $request->validate([
            "name" => "required",
            "status" => "required"
        ]);

        $new = new Categories;
        $new->name = $request->name;
        $new->status = $request->status;
        $new->save();

        return redirect()->route("admin.list.categories")->with("success", "Category has been created...");
    }

    public function edit_category($id)
    {
        $title = "Edit Category";

        $category = Categories::find($id);

        $data = compact("title", "category");

        return view("admin.edit-category")->with($data);
    }

    public function update_category($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "status" => "required"
        ]);

        $new = Categories::find($id);
        $new->name = $request->name;
        $new->status = $request->status;
        $new->update();

        return redirect()->route("admin.list.categories")->with("success", "Category has been updated...");
    }

    public function delete_category($id)
    {
        Categories::find($id)->delete();

        return redirect()->back()->with("success", "Category has been deleted....");
    }

    public function list_users()
    {
        $title = "List Of Users";

        $users = siteUsers::latest("created_at")->with("gifs", "followers")->get();

        // $users = siteUsers::where("id", 1)->whereHas(["gifs" => function($query){
        //     $query->where("type", "image")->get();
        // }]);

        $data = compact("title", "users");

        return view("admin.list-users")->with($data);
    }

    public function list_banned_users()
    {
        $title = "List Of Banned Users";

        $users = siteUsers::where("status", 4)->get();

        $data = compact("title", "users");

        return view("admin.list-banned-users")->with($data);
    }

    public function add_user()
    {
        $title = "Add User";

        $data = compact("title");

        return view("admin.add-user")->with($data);
    }

    public function store_user(Request $request)
    {

        $request->validate([
            "name" => "required",
            "username" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password",
            "status" => "required",
        ]);

        $check = siteUsers::where("email", $request->email)->first();

        if (!$check) {
            if ($check != null) {
                if ($request->username == $check->user_name) {
                    return redirect()->back()->with("error", "Email already exists.......");
                } else {
                    $insert = new siteUsers;
                    $insert->name = $request->name;
                    $insert->user_name = $request->username;
                    $insert->email = $request->email;
                    $insert->password = Hash::make($request->password);
                    $insert->status = 1;
                    $insert->save();

                    return redirect()->route("admin.list.users")->with("success", "User has been created.....");
                }
            } else {
                $insert = new siteUsers;
                $insert->name = $request->name;
                $insert->user_name = $request->username;
                $insert->email = $request->email;
                $insert->password = Hash::make($request->password);
                $insert->status = 1;
                $insert->save();

                return redirect()->route("admin.list.users")->with("success", "User has been created.....");
            }
        } else {
            return redirect()->back()->with("error", "Email already exists.......");
        }
    }

    public function edit_user($id)
    {
        $title = "Edit User";

        $user = siteUsers::find($id);

        $data = compact("title", "user");

        return view("admin.edit-user")->with($data);
    }

    public function update_user($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "username" => "required",
            "email" => "required",
            "status" => "required",
        ]);

        if ($request->password && $request->confirm_password) {
            $request->validate([
                "password" => "required",
                "confirm_password" => "required|same:password",
            ]);
            siteUsers::where("id", $id)->update([
                "name" => $request->name,
                "user_name" => $request->username,
                "email" => $request->email,
                "status" => $request->status,
                "password" => Hash::make($request->password),
            ]);
        } else {
            siteUsers::where("id", $id)->update([
                "name" => $request->name,
                "user_name" => $request->username,
                "email" => $request->email,
                "status" => $request->status,
            ]);
        }

        return redirect()->route("admin.list.users")->with("success", "User has been updated...");
    }

    public function delete_user($id)
    {
        siteUsers::find($id)->delete();

        return redirect()->back()->with("success", "User has been removed....");
    }

    public function ban_user($id)
    {
        siteUsers::where("id", $id)->update([
            "status" => 4
        ]);

        return redirect()->back()->with("success", "User has been banned....");
    }

    public function unban_user($id)
    {
        siteUsers::where("id", $id)->update([
            "status" => 1
        ]);

        return redirect()->back()->with("success", "Ban has been removed from the user...");
    }

    public function release_user($id)
    {
        siteUsers::where("id", $id)->update([
            "status" => 1
        ]);

        return redirect()->back()->with("success", "User has been released....");
    }

    public function list_gifs()
    {
        $title = "Hottes Images";

        $gifs = gifs::latest("created_at")->where("status", "!=", 4)->where("hottest", '1')->with('tags')->get();

        $data = compact("title", "gifs");

        return view("admin.list-gifs")->with($data);
    }

    public function add_gif()
    {
        $title = "Upload Gif";

        $categories = Categories::where("status", 1)->get();

        $data = compact("title", "categories");

        return view("admin.add-gif")->with($data);
    }

    public function store_gif(Request $request)
    {
        $request->validate([
            "category" => "required",
            "orientation" => "required",
            "tags" => "required",
            "file" => "required",
            "nsfw" => "required",
        ]);

        $tagString = explode(",", $request->tags);

        $fileName = Str::random() . '.' . $request->file->extension();
        $request->file->move(public_path('Gifs'), $fileName);

        $user_id = session("admin_id");

        $new = new gifs;
        $new->user_id = session("admin_id");
        $new->category_id = $request->category;
        $new->role = "admin";
        $new->gif = $fileName;
        $new->orientation = $request->orientation;
        $new->type = "image";
        $new->nfsw = $request->nsfw;
        $new->status = 1;
        $new->save();

        $id = $new->id;

        foreach ($tagString as $item) {
            $itemTrim = trim($item);

            if (!empty($item)) {

                $tag = Tags::create(['tags' => $itemTrim, 'gif_id' => $id]);
            }
        }

        return redirect()->route("admin.list.gifs")->with("success", "Gif/Image has been uploaded...");
    }

    public function delete_gif($id)
    {


    	Tags::where("gif_id", $id)->delete();
        gifs::find($id)->delete();

        return redirect()->back()->with("success", "Gif has been removed....");
    }

    public function list_user_gifs()
    {
        $title = "List Of Gifs";

        $gifs = gifs::latest("created_at")->where("role", "user")->with('userInfo', 'tags', "categoryInfo", "reports")->get();

        $data = compact("title", "gifs");

        return view("admin.list-user-gifs")->with($data);
    }

    public function approve_gif($id)
    {
        gifs::where("id", $id)->update([
            "status" => 1
        ]);

        return redirect()->back()->with("success", "Approved...");
    }

    public function settings()
    {
        $title = "Settings";

        $setting = Settings::find(1);

        $data = compact("title", "setting");

        return view("admin.settings")->with($data);
    }

    public function update_settings(Request $request)
    {
        Settings::where("id", 1)->update([
            "twitter" => $request->twitter,
            "reddit" => $request->reddit,
            "discord" => $request->discord,
        ]);

        return redirect()->back()->with("success", "Settings has been updated....");
    }

    public function markVerified($id)
    {
        siteUsers::where("id", $id)->update([
            "verified" => 1
        ]);

        return redirect()->back()->with("success", "User has been verified");
    }

    public function addsList()
    {
        $title = "Advertisement";

        $advertisements = Adds::all();

        $data = compact("title", "advertisements");

        return view("admin.list-advertisements")->with($data);
    }

    public function addCreate()
    {
        $title = "Create Advertisement";

        $data = compact("title");

        return view("admin.add-create")->with($data);
    }

    public function edit_add($id)
    {
        $title = "Edit Advertisement";

        $add = Adds::find($id);

        $data = compact("title", "add");

        return view("admin.add-edit")->with($data);
    }

    public function delete_add($id)
    {
        Adds::find($id)->delete();

        return redirect()->route('admin.adds.list')->with('success',  'Advertisement has been deleted....');
    }

    public function update_add(Request $request, $id)
    {
        if ($request->file("image")) {

            $request->validate([
                'image' => 'required|dimensions:max_width=600,max_height=400',
            ]);

            $fileName = Str::random(16) . '.' . $request->image->extension();
            $request->image->move(public_path('adds'), $fileName);
        } else {

            $fileName = $request->image;
        }

        $add = Adds::find($id);

        $add->image = $fileName;
        $add->link = $request->link;
        $add->save();

        return redirect()->route('admin.adds.list')->with('success',  'Advertisement has been updated....');
    }

    public function store_add(Request $request)
    {
        $request->validate([
            'image' => 'required|dimensions:max_width=600,max_height=400',
        ]);

        if ($request->file("image")) {

            $fileName = Str::random(16) . '.' . $request->image->extension();
            $request->image->move(public_path('adds'), $fileName);
        } else {

            $fileName = $request->image;
        }

        $add = new Adds;
        $add->image = $fileName;
        $add->link = $request->link;
        $add->save();

        return redirect()->route('admin.adds.list')->with('success',  'Advertisement has been created....');
    }

    public function make_hottest($id)
    {
        gifs::where("id", $id)->update([
            "hottest" => "1"
        ]);

        return redirect()->back()->with("success", "The selected Image has been added to hottest section.");
    }

    public function remove_hottest($id)
    {
        gifs::where("id", $id)->update([
            "hottest" => NULL
        ]);

        return redirect()->back()->with("error", "The selected Image has been removed from hottest section.");
    }

	public function delete_tags()
    {
    	Tags::truncate();

    	echo "Success";
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            "password" => "required",
            "confirm_password" => "required|same:password",
        ]);

        Admins::where("id", 1)->update([
            "password" => Hash::make($request->password)
        ]);

        return redirect()->back()->with("success", "Password has been updated...");
    }
}
