<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('categories',[CategoryController::class, 'categories'])->name('categories');
Route::get('add-category',[CategoryController::class, 'addcategory'])->name('addcategory');
// Route::get('view-category',[CategoryController::class, 'viewcategory'])->name('viewcategory');
Route::post('post-category',[CategoryController::class, 'postcategory'])->name('postcategory');
//Update
Route::post('update-category',[CategoryController::class, 'updatecategory'])->name('updatecategory');
//delete category
Route::get('delete-category/{cat}',[CategoryController::class, 'deletecategory'])->name('deletecategory');
//edit category
Route::get('edit-category/{cat}',[CategoryController::class, 'editcategory'])->name('editcategory');
Route::get('trashed-category',[CategoryController::class, 'trashedcategory'])->name('trashedcategory');
Route::get('restore-category/{slug}',[CategoryController::class, 'restorecategory'])->name('restorecategory');
Route::get('permanent-category/{id}',[CategoryController::class, 'permanentcategory'])->name('permanentcategory');
Route::get('subcategories',[SubCategoryController::class, 'subcategories'])->name('subcategories');
Route::get('add-subcategory',[SubCategoryController::class, 'addsubcategory'])->name('addsubcategory');
Route::post('post-subcategory',[SubCategoryController::class, 'postsubcategory'])->name('postsubcategory');
//chek-box click delete
Route::post('all-subcategory-delete',[SubCategoryController::class, 'AllDeleteSubCategory'])->name('AllDeleteSubCategory');
//show-soft-sub-cat-delete
Route::get('sub-trashed-category',[SubCategoryController::class, 'subtrashedcategory'])->name('subtrashedcategory');

require __DIR__.'/auth.php';

//product

Route::get('products',[ProductController::class, 'products'])->name('products');
Route::get('add-products',[ProductController::class, 'addproducts'])->name('addproducts');
Route::post('post-products',[ProductController::class, 'postproducts'])->name('postproducts');
Route::GET('api/get-subcat-list/{cat_id}',[ProductController::class, 'GetSubCat'])->name('GetSubCat');
// Route::get('product-view',[ProductController::class, 'productview'])->name('productview');
