<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** Complete ADmin Routes  **/

// Admin ROute For Fake Admin
Route::get('/fake-admin', [AdminController::class, "fakeAdmin"])->name("fake-admin");

// Admin Route For Login
Route::get('/admin/login', [AdminController::class, "login"])->name("admin.login");

// Admin Route For Login Check
Route::post('/admin/login-check', [AdminController::class, "login_check"])->name("admin.login.check");

/* Grouped Routes */
Route::middleware(['admin'])->prefix("admin")->group(function () {

    // Route For Admin Dashboard
    Route::get('/dashboard', [AdminController::class, "dashboard"])->name("admin.dashboard");

    // Route For Admin List Of Categories
    Route::get('/list-categories', [AdminController::class, "list_categories"])->name("admin.list.categories");

    // Route For Admin Create Category
    Route::get('/add-category', [AdminController::class, "add_category"])->name("admin.add.category");

    // Route For Admin Store Category
    Route::post('/store-category', [AdminController::class, "store_category"])->name('admin.store.category');

    // Route for Admin Deleteion Of Cateogory
    Route::get('/delete-category/{id}', [AdminController::class, "delete_category"])->name("admin.delete.category");

    // Route FOr Admin Edit Category
    Route::get('/edit-category/{id}', [AdminController::class, "edit_category"])->name('admin.edit.category');

    // Route For Admin Update Cateogry
    Route::post('/update-category/{id}', [AdminController::class, "update_category"])->name("admin.update.category");

    // Route for Admin List Of Users
    Route::get('/list-users', [AdminController::class, "list_users"])->name("admin.list.users");

    // Route For Admin List Of Banned User
    Route::get('/list-banned-users', [AdminController::class, 'list_banned_users'])->name("admin.list.banned.users");

    // Route For Admin Adding User
    Route::get('/add-user', [AdminController::class, "add_user"])->name("admin.add.user");

    // Route For Admin Storing User
    Route::post('/store-user', [AdminController::class, "store_user"])->name("admin.store.user");

    // Route For Admin Edit User
    Route::get('/edit-user/{id}', [AdminController::class, "edit_user"])->name("admin.edit.user");

    // Route For Admin Update User
    Route::post('/update-user/{id}', [AdminController::class, "update_user"])->name("admin.update.user");

    // Route For Admin Deleteion Of User
    Route::get('/delete-user/{id}', [AdminController::class, "delete_user"])->name("admin.delete.user");

    // Routre For Admin For Banning Of User
    Route::get('/ban-user/{id}', [AdminController::class, "ban_user"])->name("admin.ban.user");

    // Admin Route For Remove Ban From User
    Route::get('/remove-ban/{id}', [AdminController::class, "unban_user"])->name("remove.ban");

    // Route For Admin For Releasing Of User
    Route::get('/release-user/{id}', [AdminController::class, "release_user"])->name("admin.release.user");

    // Route For Admin List Of Gifs
    Route::get('/list-gifs', [AdminController::class, "list_gifs"])->name("admin.list.gifs");

    // Route For Admin Create Or Upload Gif
    Route::get('/add-gif', [AdminController::class, "add_gif"])->name("admin.add.gif");

    // Route For Admin Upload Or Storing Gif
    Route::post('/store-gif', [AdminController::class, "store_gif"])->name("admin.store.gif");

    // Route for Admin Deleteion of Gif
    Route::get('/delete-gif/{id}', [AdminController::class, "delete_gif"])->name("admin.delete.gif");

    // Route For Admin List Of Users Gif
    Route::get('/list-user-gif', [AdminController::class, "list_user_gifs"])->name("admin.list.user.gif");

    // Admin Route For Approving Gif
    Route::get('/approve-gif/{id}', [AdminController::class, "approve_gif"])->name("admin.approve.gif");

    // Admin Route For Admin Settings
    Route::get('/settings', [AdminController::class, "settings"])->name("admin.settings");

    // Admin Route For Settings Update
    Route::post('/update-settings', [AdminController::class, "update_settings"])->name("admin.update.settings");

    // Admin Route For Make The User verified
    Route::get('/verify-user/{id}', [AdminController::class, "markVerified"])->name("admin.verify.user");

    // Admin Route For Adds List
    Route::get('/adds-list', [AdminController::class, "addsList"])->name("admin.adds.list");

    // Admin Route For Add Create
    Route::get('/add-create', [AdminController::class, "addCreate"])->name("admin.add.create");

    // Admin Route For Updating adds
    Route::post('/update-add/{id}', [AdminController::class, "update_add"])->name("admin.update.add");

    // Admin Route For Deleting add
    Route::get('/add-delete/{id}', [AdminController::class, "delete_add"])->name("admin.delete.add");

    // Admin Route For Updating adds
    Route::get('/edit-add/{id}', [AdminController::class, "edit_add"])->name("admin.edit.add");

    // Admin Route For Storing adds
    Route::post('/store-add', [AdminController::class, "store_add"])->name("admin.store.add");

    // Route For Make Hottest Image
    Route::get('/make-hottest/{id}', [AdminController::class, "make_hottest"])->name("admin.make.hottest");

    // Route For Remove Hottest Image
    Route::get('/remove-hottest/{id}', [AdminController::class, "remove_hottest"])->name("admin.remove.hottest");

    // Route For Admin Logout
    Route::get('/logout', [AdminController::class, "logout"])->name('admin.logout');

    // Admin route For Update Password
    Route::post('/update-password', [AdminController::class, "passwordUpdate"])->name("admin.update.password");

// Route For Delete All Tags
	Route::get('/delete-tags', [AdminController::class, "delete_tags"]);
});
/* End Grouped Routes */

/** End ADmin Routes  **/

/** Complete Index Routes  **/

// Route For Home Page
Route::get('/', [IndexController::class, "index"])->name("home.page");

// Route For FAQ
Route::get('/faq', [IndexController::class, "faq"])->name("faq");

// Route For Guide Line
Route::get('/guideline', [IndexController::class, 'guideline'])->name("guideline");

// Route For Privacy Policy
Route::get('/privacy-policy', [IndexController::class, "privacy_policy"])->name("privacy.policy");

// Route For DMCA
Route::get('/dmca', [IndexController::class, "dmca"])->name("dmca");

// Route For 2257-Statement
Route::get('/2257-statement', [IndexController::class, "statement"])->name("statement");

// Route For Terms & Conditions
Route::get('/terms-condition', [IndexController::class, "terms_conditions"])->name("term.condition");

// Route For Login Signup
Route::get('/login-signup', [IndexController::class, "login"])->name("login");

// Route For Storing User
Route::post('/register-post', [IndexController::class, "store_user"])->name("register.post");

// Route For Login Check
Route::post('/login-check', [IndexController::class, "login_check"])->name("user.login.check");

// Route For Profile View Of A User
Route::get('/profile-page/{id}', [IndexController::class, "profile_page"])->name("user.profile.page");

// Route For Gallery Page
Route::get('/gallery', [IndexController::class, 'gallery'])->name("gallery");

// Route For See All Dynamix Function
Route::get('/see-all/{name}', [IndexController::class, "see_all"])->name("see.all");

// Route For All Creators
Route::get('/all-creators', [IndexController::class, "creators"])->name("all.creators");

// Route For Detail Page
Route::get('/detail-page/{id}', [IndexController::class, "detail_page"])->name("detail.page");

// Route For Verified Creators
Route::get('/verified-creators', [IndexController::class, "verified_creators"])->name("verified.creators");

// Route Fokr Images From Header
Route::get('/images', [IndexController::class, "headerImages"])->name("images");

// Route For Searching by field
Route::get('/search', [IndexController::class, "search"])->name("search");

// Route For Tags Searching
Route::get('search-by-tags/{name}', [IndexController::class, "search_by_tags"])->name("search.by.tags");

// Route For Ajax aView Count
Route::get('/view-count', [IndexController::class, "viewCount"])->name("viewCount");

// Route For Follow Someone
Route::get('/follow', [IndexController::class, "followFunction"])->name("user.follow");

Route::middleware(['user'])->group(function () {

    // Route For User Upload Form
    Route::get('/upload-form', [IndexController::class, "uploadForm"])->name("user.upload.form");

    // Route For Storing Form
    Route::post('/store-upload-form', [IndexController::class, "store_form"])->name("user.store.form");

    // Route For User Dashboard
    Route::get('/user-dashboard', [IndexController::class, "profile_view"])->name("user.profile");

    // Route For Update Profile Picture
    Route::post('/update-profile', [IndexController::class, "update_profile"])->name("update.profile");

    // Route For Update Profile Picture
    Route::post('/update-profile-picture', [IndexController::class, "update_profile_picture"])->name("update.profile.picture");

    // Route For Deletion Of GIf
    Route::get('/delete-gif/{id}', [IndexController::class, "delete_gif"])->name("user.delete.gif");

    // Rouet For Likes Of Gif
    Route::get('/like', [IndexController::class, "like"])->name("user.like");

    // Route For UnFollow Someone
    Route::get('/unfollow/{id}', [IndexController::class, "unfollowFunction"])->name("user.unfollow");

    // Route For Follow Someone
    Route::get('/follow-load/{id}', [IndexController::class, "follow_load"])->name("follow.load");

    // Route For Reporting
    Route::get('/report/', [IndexController::class, "reporting"])->name("post.report");

    // Route For Logout
    Route::get('/logout', [IndexController::class, "logout"])->name("user.logout");
});

/** End Index Routes  **/
