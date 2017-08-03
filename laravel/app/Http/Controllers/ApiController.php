<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Campaign;
use App\Profile;

use App\User;

class ApiController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->respond(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->respond(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return $this->respond(compact('token'));
    }

    public function checkToken(Request $request) {
        // middleware will check if it is a valid token.
        return $this->respond("ok");
    }

    public function getLoggedInUser(Request $request) {
        $user = User::find(JWTAuth::parseToken()->authenticate()['id']);

        // the token is valid and we have found the user via the sub claim
        return $this->respond(compact('user'));
    }

    public function getAssociatedCampaigns() {
        $user = User::find(JWTAuth::parseToken()->authenticate()['id']);

        $campaigns = Campaign::with("gm")->associatedToUser($user)->get();

        return $this->respond($campaigns);
    }

    public function getProfilesForCampaign($campaign_id) {
        $user = User::find(JWTAuth::parseToken()->authenticate()['id']);
        $campaign = Campaign::findOrFail($campaign_id);

        if( $user->isGmForCampaign($campaign) ) {
            $profiles = Profile::where('campaign_id', $campaign->id)
                                ->get();

            return $this->respond($profiles);
        } else {
            $profile = Profile::where('campaign_id', $campaign->id)
                                ->where('user_id', $user->id)
                                ->first();

            if( empty($profile) ) {
                return $this->respond(["error" => "model_not_found", "error_msg" => "Profile could not be found."], 404);
            }

            return $this->respond($profile);
        }
    }

    private function respond($data, $status_code = 200) {
        return response()->json($data, $status_code);
    }
}
