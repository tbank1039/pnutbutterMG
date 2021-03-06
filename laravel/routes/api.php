<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login", "ApiController@login");

Route::middleware(["jwt.auth"])->group(function() {
    Route::get("checkToken", "ApiController@checkToken");
    Route::get("user", "ApiController@getLoggedInUser");
    Route::get("campaigns", "ApiController@getAssociatedCampaigns");
    Route::get("profilesForCampaign/{campaign_id}", "ApiController@getProfilesForCampaign");
});
