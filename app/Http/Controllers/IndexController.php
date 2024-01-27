<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Followers;
use App\Models\gifs;
use App\Models\Likes;
use App\Models\Reports;
use App\Models\siteUsers;
use App\Models\Tags;
use App\Models\User;
use App\Models\Views;
use App\Models\Adds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IndexController extends Controller
{

    public function index()
    {
        $title = "Home";

        $tags = Tags::with("posts")->orderBy("created_at", "Desc")->limit(30)->get();

        $gifs = gifs::where("status", 1)->orderBy("created_at", "Desc")->with("userInfo", "tags", "likes", "views")->get();

        // This Method is working to get tags which are unique with their post count
        $tagCollection = [];

        foreach ($tags->unique("tags") as $tag) {
            $tagCollection[] = $tag->tags;
        }

        $tagPosts = [];

        foreach ($tagCollection as $tag) {
            $postCount = Tags::where("tags", $tag)->count();

            $tagPosts[] = [
                "tag" => $tag,
                "postCount" => $postCount,
            ];
        }
        // End Method

        // This Method is working to get Trending Creators
        $currentDateTime = now();
        $thirtyMinutesAgo = $currentDateTime->subMinutes(30);

        $trendingPosts = Gifs::where('status', 1)
            ->withCount('likes') // Count the likes
            ->having('likes_count', '>=', 20) // Filter by at least 20 likes
            ->whereHas('likes', function ($query) use ($thirtyMinutesAgo) {
                $query->where('created_at', '>=', $thirtyMinutesAgo);
            })
            ->with("userInfo", "views")
            ->get();

        // End Method

        // dd($trendingPosts);

        // This Method is working to get Gifs From Verified Creators
        $verifiedCreators = siteUsers::where("verified", 1)->with("gifs")->get();

        $users = siteUsers::where("status", 1)->with("followers")->orderBy("created_at", "Desc")->get();

        $data = compact("title", "tags", "gifs", "users", "tagPosts", "trendingPosts", "verifiedCreators");

        return view("template.index")->with($data);
    }

    public function faq()
    {
        $title = "Frequently Asked Questions";

        $data = compact("title");

        return view("template.faq")->with($data);
    }

    public function guideline()
    {
        $title = "Guide Line";

        $data = compact("title");

        return view("template.guideline")->with($data);
    }

    public function privacy_policy()
    {
        $title = "Privacy Policy";

        $data = compact("title");

        return view("template.privacy-policy")->with($data);
    }

    public function dmca()
    {
        $title = "DMCA";

        $data = compact("title");

        return view("template.dmca")->with($data);
    }

    public function statement()
    {
        $title = "2257-Statement";

        $data = compact("title");

        return view("template.2257-statement")->with($data);
    }

    public function terms_conditions()
    {
        $title = "Terms & Conditions";

        $data = compact("title");

        return view("template.terms-condition")->with($data);
    }

    public function login()
    {
        $title = "Login - SignUp";

        $data = compact("title");

        return view("template.signup-login")->with($data);
    }

    public function login_check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $check = siteUsers::where("email", $request->email)->first();

        if ($check && $check->status != 4 && $check->status != 0) {
            if (Hash::check($request->password, $check->password)) {
                session()->put('user_id', $check->id);
                return redirect()->route("home.page");
            } else {
                return redirect()->back()->with("error", "User not found....");
            }
        } else {
            return redirect()->back()->with("error", "User not found....");
        }
    }

    public function logout()
    {
        session()->forget("user_id");
        return redirect()->route("login")->with("success", "Loggedout Successfully....");
    }

    public function store_user(Request $request)
    {
        $request->validate([
            "username" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password",
        ]);

        $check = siteUsers::where("email", $request->email)->orWhere("user_name", $request->username)->first();

        if ($check) {
            return redirect()->back()->with("error", "User already exists.......");
        } else {

            $insert = new siteUsers;
            $insert->name = "name";
            $insert->user_name = $request->username;
            $insert->email = $request->email;
            $insert->password = Hash::make($request->password);
            $insert->status = 1;
            $insert->save();

            return redirect()->back()->with("success", "Registered successfully. Please login to continue.");
        }
    }

    public function profile_view()
    {
        $title = "Profile";

        $id = session("user_id");

        $user = siteUsers::with("gifs", "followers", "following")->find($id);

        $gifs = gifs::where("user_id", $id)->where("role", "user")->with("likes", "reports", "views")->get();

        $data = compact("title", "user", "gifs");

        return view("template.dashboard")->with($data);
    }

    public function delete_gif($id)
    {
        gifs::find($id)->delete();

        return redirect()->back()->with("success", "Gif has been deleted....");
    }

    public function update_profile(Request $request)
    {
        $id = session("user_id");

        siteUsers::where("id", $id)->update([
            "facebook" => $request->facebook,
            "google" => $request->google,
            "twitter" => $request->twitter,
            "short_description" => $request->description
        ]);

        return redirect()->back()->with("success", "Profile has been updated....");
    }

    public function update_profile_picture(Request $request)
    {


        $fileName = Str::random(16) . '.' . $request->profile->extension();
        $request->profile->move(public_path('profilePicture'), $fileName);

        $id = session("user_id");

        siteUsers::where("id", $id)->update([
            "profile_picture" => $fileName,
        ]);

        return redirect()->back()->with("success", "Profile has been updated....");
    }

    public function uploadForm()
    {
        $title = "Upload Form";

        $categories = Categories::where("status", 1)->get();

        $data = compact("title", "categories");

        return view("template.gif-uploader")->with($data);
    }

    public function store_form(Request $request)
    {

        if ($request['type'] == 'image') {
            $request->validate([
                "title" => "required",
                "description" => "required",
                "category" => "required",
                "type" => "required",
                "orientation" => "required",
                "tags" => "required",
            ]);

            $tagString = explode(",", $request->tags);

            $fileName = Str::random() . '.' . $request->file->extension();
            $request->file->move(public_path('Gifs'), $fileName);

            $user_id = session("admin_id");

            $new = new gifs;
            $new->user_id = session("user_id");
            $new->category_id = $request->category;
            $new->title = $request->title;
            $new->description = $request->description;
            $new->role = "user";
            $new->gif = $fileName;
            $new->type = $request->type;
            $new->orientation = $request->orientation;
            $new->status = 0;
            $new->save();

            $id = $new->id;

            foreach ($tagString as $item) {
                $itemTrim = trim($item);

                if (!empty($item)) {
                    $tag = Tags::create(['tags' => $itemTrim, 'gif_id' => $id]);
                }
            }

            return redirect()->route("user.profile")->with("success", "Uploaded successfully. Please wait admin will review and publish it....");
        }

        if ($request['type'] == 'gif') {

            $request->validate([
                "title" => "required",
                "description" => "required",
                "category" => "required",
                "type" => "required",
                "sound" => "required",
                "orientation" => "required",
                "duration" => "required",
                "tags" => "required",
                // "nfsw" => "required",
            ]);

            $extension = $request->file('file')->extension();
            $videoFormats = ['mp4', 'avi', 'mov', 'mkv', 'flv', 'webm', '3gp', '3g2', 'mpeg', 'ogv', 'h264', 'h265', 'vp9', 'divx', 'xvid', 'mov', 'dv', 'hdr10', 'mjpeg', 'theora', 'avchd', 'm2ts', 'mts', 'swf', 'r3d', 'mxf', 'ts'];
            if (in_array(strtolower($extension), $videoFormats)) {
                $tagString = explode(",", $request->tags);
                $fileName = Str::random() . '.' . $request->file->extension();
                $request->file->move(public_path('Gifs'), $fileName);
                $user_id = session("admin_id");
                $new = new gifs;
                $new->user_id = session("user_id");
                $new->category_id = $request->category;
                $new->title = $request->title;
                $new->description = $request->description;
                $new->role = "user";
                $new->gif = $fileName;
                $new->type = $request->type;
                $new->sound = 1;
                $new->orientation = $request->orientation;
                $new->duration = $request->duration;
                $new->status = 0;
                $new->save();

                $id = $new->id;

                foreach ($tagString as $item) {
                    $itemTrim = trim($item);

                    if (!empty($item)) {
                        $tag = Tags::create(['tags' => $itemTrim, 'gif_id' => $id]);
                    }
                }
                return redirect()->route("user.profile")->with("success", "Uploaded successfully. Please wait admin will review and publish it....");
            } else {

                $tagString = explode(",", $request->tags);
                $fileName = Str::random() . '.' . $request->file->extension();
                $request->file->move(public_path('Gifs'), $fileName);
                $user_id = session("admin_id");
                $new = new gifs;
                $new->user_id = session("user_id");
                $new->category_id = $request->category;
                $new->title = $request->title;
                $new->description = $request->description;
                $new->role = "user";
                $new->gif = $fileName;
                $new->type = $request->type;
                $new->sound = 0;
                $new->orientation = $request->orientation;
                $new->duration = $request->duration;
                $new->status = 0;
                $new->save();

                $id = $new->id;

                foreach ($tagString as $item) {
                    $itemTrim = trim($item);

                    if (!empty($item)) {
                        $tag = Tags::create(['tags' => $itemTrim, 'gif_id' => $id]);
                    }
                }
                return redirect()->route("user.profile")->with("success", "Uploaded successfully. Please wait admin will review and publish it....");
            }
        }
    }

    public function profile_page($id)
    {
        $title = "Profile Page";

        $user = siteUsers::with('followers', 'following')->find($id);

        $posts = gifs::where("user_id", $id)->get();

        $tags = [];

        foreach ($posts as $post) {
            $tagsForPost = Tags::where("gif_id", $post->id)->pluck('tags')->toArray();
            $tags = array_unique(array_merge($tags, $tagsForPost));
        }

        $data = compact("title", "user", "tags", "posts", "id");

        return view("template.profile")->with($data);
    }

    public function gallery()
    {
        $title = "Gallery";

        $data = compact("title");

        return view("template.gallery")->with($data);
    }

    public function see_all($name)
    {
        $finalName = str_replace("-", " ", $name);

        $title = ucfirst($finalName);

        // dd($finalName);

        if ($finalName == "trending") {
            $currentDateTime = now();
            $thirtyMinutesAgo = $currentDateTime->subMinutes(30);
            $postss = Gifs::where('status', 1)
                ->withCount('likes') // Count the likes
                ->having('likes_count', '>=', 20) // Filter by at least 20 likes
                ->whereHas('likes', function ($query) use ($thirtyMinutesAgo) {
                    $query->where('created_at', '>=', $thirtyMinutesAgo);
                })
                ->with("userInfo", "likes", "views")
                ->orderBy("created_at", "Desc")
                ->get();

            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }

        if ($finalName == "hottest image") {

            $postss = gifs::where("status", 1)->where("hottest", "1")
                ->with("userInfo", "likes", "views")
                ->where("type", "image")
                ->orderBy("created_at", "Desc")
                ->get();

            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }

        if ($finalName == "gifs from verified creators") {

            $verfiedCreators = siteUsers::where("verified", 1)->get();

            $postss = [];

            foreach ($verfiedCreators as $creator) {
                $getPosts = Gifs::where("status", 1)
                    ->where("type", "gif")
                    ->with("likes", "views", "userInfo")
                    ->where("user_id", $creator->id)
                    ->orderBy("created_at", "Desc")
                    ->get();

                $postss = $getPosts;
            }


            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }

        if ($finalName == "gifs with sound") {

            $postss = gifs::where("status", 1)->where('type', 'gif')
                ->with("userInfo", "likes", "views")
                ->where('sound', '1')->get();

            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }

        if ($finalName == "verified images") {

            $verfiedCreators = siteUsers::where("verified", 1)->get();

            $postss = [];

            foreach ($verfiedCreators as $creator) {
                $getPosts = gifs::where("status", 1)->where("type", "image")
                    ->with("likes", "views", "userInfo")
                    ->where("user_id", $creator->id)
                    ->orderBy("created_at", "Desc")
                    ->get();

                $postss = $getPosts;
            }

            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }

        if ($finalName == "vertical gifs") {

            $postss = gifs::where("status", 1)->where('orientation', 'vertical')
                ->where('type', 'gif')->where('duration', 'normal')
                ->where('sound', '0')
                ->orderBy("created_at", "Desc")
                ->get();

            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }

        if ($finalName == "longer gifs") {

            $postss = gifs::where("status", 1)->where("duration", "long")->where("type", "gif")
                ->with("userInfo", "likes", "views")
                ->orderBy("created_at", "Desc")
                ->get();

            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }

        if ($finalName == "horizontal gifs") {

            $postss = gifs::where("status", 1)->where("type", "gif")->where("orientation", "horizontal")
                ->with("userInfo", "likes", "views")
                ->orderBy("created_at", "Desc")
                ->get();

            // dd($postss);

            $data = compact("title", "postss");

            return view("template.see-all")->with($data);
        }
    }

    public function like()
    {

        $id = $_GET["id"];

        $reportCount = Likes::where("gif_id", $id)->where("user_id", session("user_id"))->first();

        if ($reportCount) {

            Likes::where("gif_id", $id)->where("user_id", session("user_id"))->delete();

            $status = "unLiked";

            return response($status);
        } else {
            // Assuming 'Reports' is the name of your model
            $report = Likes::firstOrNew([
                'gif_id' =>  $id,
                'user_id' => session("user_id")
            ]);

            // Now, you need to save the model instance
            $report->save();

            $status = "liked";

            return response($status);
        }
    }

    public function creators()
    {
        $title = "Creators";

        $users = siteUsers::with("followers")->get();

        $data = compact("title", "users");

        return view("template.profiles")->with($data);
    }

    public function verified_creators()
    {
        $title = "Verified Creators";

        $users = siteUsers::where("verified", 1)->orderBy("created_at", "Desc")->with("followers")->get();

        $data = compact("title", "users");

        return view("template.profiles")->with($data);
    }

    public function headerImages()
    {
        $title = "Images";

        $data = compact("title");

        return view("template.images")->with($data);
    }

    public function search_by_tags($name)
    {
        $title = "Tag: " . $name;

        $postss = Gifs::where("status", 1)
            ->whereHas('tags', function ($query) use ($name) {
                $query->where("tags", $name);
            })
            ->with("likes", "views", "userInfo")
            ->get();

        $data = compact("title", "postss");

        return view("template.search-by-tags")->with($data);
    }

    public function followFunction()
    {
        if (session("user_id")) {
            $id = $_GET["id"];

            $check = Followers::where("follow_id", $id)->where("follower_id", session("user_id"))->first();

            if ($check) {
                Followers::find($check->id)->delete();

                $error = 200;

                $data = compact("error");

                return response($data);
            } else {
                $report = Followers::create([
                    'follow_id' =>  $id,
                    'follower_id' => session("user_id")
                ]);

                $error = 201;

                $data = compact("id", "error", "report");

                return response($data);
            }
        } else {

            $error = 404;

            $data = compact("error");

            return response($data);
        }
    }

    public function unfollowFunction($id)
    {
        Followers::find($id)->delete();

        return redirect()->back()->with("unfollowed", "Unfollwed Successfully....");
    }

    public function reporting()
    {

        $id = $_GET["id"];

        // Assuming 'Reports' is the name of your model
        $report = Reports::firstOrNew([
            'gif_id' =>  $id,
            'user_id' => session("user_id")
        ]);

        // Now, you need to save the model instance
        $report->save();

        return response("reported");
    }

    public function search(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        $postss = Tags::where("tags", "LIKE", "%$request->name")->with("posts")->get();

        $title = "Search By: " . $request->name;

        // dd($postss);

        $data = compact("title", "postss");

        return view("template.search")->with($data);
    }

    public function viewCount(Request $request)
    {
        $id = $_GET["id"];
        $ip = $_GET["ip"];

        $report = Views::firstOrNew([
            'ip_address' =>  $ip,
            'gif_id' => $id
        ]);

        // Now, you need to save the model instance
        $report->save();

        $data = compact("id", "ip");

        return response($data);
    }

    public function follow_load($id)
    {
        $report = Followers::create([
            'follow_id' =>  $id,
            'follower_id' => session("user_id")
        ]);

        $report->save();

        return redirect()->back()->with("followed", "Followed successfully...");
    }

    public function detail_page($id)
    {
        $title = "Detail Page";

        $postdetail = gifs::with("userInfo", "tags", "likes", "views")->find($id);

        $postss = gifs::with("userInfo", "tags", "likes", "views")->get();

        $adds = Adds::all();

        // echo "<pre>";
        // print_r($adds->toArray());
        // die();

        $data = compact("title", "id", "postdetail", "postss", "adds");

        return view("template.detail")->with($data);
    }
}
