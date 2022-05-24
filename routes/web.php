<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\livewire\User\UserDashboardComponent;
use App\Http\livewire\User\UserOrderComponent;
use App\Http\livewire\User\UserOrderDetailComponent;
use App\Http\livewire\User\UserReviewComponent;
use App\Http\livewire\User\UserProfileComponent;
use App\Http\livewire\User\UserProfileEditComponent;
use App\Http\livewire\User\UserChangePasswordComponent;
use App\Http\livewire\HomeComponent;
use App\Http\livewire\ShopComponent;
use App\Http\livewire\CartComponent;
use App\Http\livewire\CheckoutComponent;
use App\Http\livewire\ThankyouComponent;
use App\Http\livewire\DetailsComponent;
use App\Http\livewire\CategoryComponent;
use App\Http\livewire\SearchComponent;
use App\Http\livewire\WishListComponent;
use App\Http\livewire\ContactComponent;
use App\Http\livewire\AboutUsComponent;


// for admin

use App\Http\livewire\Admin\AdminDashboardComponent;
use App\Http\livewire\Admin\AdminCategoryComponent;
use App\Http\livewire\Admin\AdminAddCategoryComponent;
use App\Http\livewire\Admin\AdminEditCategoryComponent;
use App\Http\livewire\Admin\AdminProductComponent;
use App\Http\livewire\Admin\AdminSaleComponent;
use App\Http\livewire\Admin\AdminAddProductComponent;
use App\Http\livewire\Admin\AdminEditProductComponent;
use App\Http\livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\livewire\Admin\AdminHomeSliderComponent;
use App\Http\livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\livewire\Admin\AdminHomeCategoryComponent;
use App\Http\livewire\Admin\AdminCouponComponent;
use App\Http\livewire\Admin\AdminAddCouponComponent;
use App\Http\livewire\Admin\AdminEditCouponComponent;
use App\Http\livewire\Admin\AdminOrderComponent;
use App\Http\livewire\Admin\AdminOrderDetailComponent;
use App\Http\livewire\Admin\AdminContactComponent;
use App\Http\livewire\Admin\AdminSettingComponent;
use App\Http\livewire\Admin\AdminAttributesComponent;
use App\Http\livewire\Admin\AdminAddAttributesComponent;
use App\Http\livewire\Admin\AdminEditAttributesComponent;

 
//for product detail
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details'); 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class);

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/cart',CartComponent::class)->name('product.cart');


// route for show the wishlist
Route::get('/wishlist',WishListComponent::class)->name('product.wishlist');

// checkout thankytou page
Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');

//contact
Route::get('/contact-us',ContactComponent::class)->name('contact');

//about us
Route::get('/about-us',AboutUsComponent::class)->name('about');


// categories
Route::get('/product-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
//for user 
Route::middleware(['auth:sanctum','verified'])->group(function()
{
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/order',UserOrderComponent::class)->name('user.order');
    Route::get('/user/order/{order_id}',UserOrderDetailComponent::class)->name('user.orderdetail');
    Route::get('/user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password',UserChangePasswordComponent::class)->name('user.changepassword');
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit',UserProfileEditComponent::class)->name('user.profileEdit');

});

//for admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function()
{
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/category',AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/product',AdminProductComponent::class)->name('admin.product');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');


    // admin home page slider
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider'); 
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider'); 
    Route::get('/admin/slider/edit{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider'); 
   
    //product category 
    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategory');

    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

    Route::get("/admin/coupon",AdminCouponComponent::class)->name('admin.coupons');
    Route::get("/admin/coupon/add",AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get("/admin/coupon/edit/{coupon_id}",AdminEditCouponComponent::class)->name('admin.editcoupon');
    // orders
    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/orders/{order_id}',AdminOrderDetailComponent::class)->name('admin.orderdetail');

    //contact
    Route::get('/admin/contact-us',AdminContactComponent::class)->name('admin.contact');

    // setting
    Route::get('/admin/settings',AdminSettingComponent::class)->name('admin.setting');

    //Attributes
    Route::get('/admin/attributes',AdminAttributesComponent::class)->name('admin.attributes');
    Route::get('/admin/attributes/add',AdminAddAttributesComponent::class)->name('admin.add_attributes');
    Route::get('/admin/attributes/edit/{attribute_id}',AdminEditAttributesComponent::class)->name('admin.edit_attributes');
    
});