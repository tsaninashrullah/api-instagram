<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Votes;
use App\Models\Users;
use App\Models\Candidates;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function getChart()
    {
        $data = [];
        foreach (Candidates::all() as $key => $value) {
            $data[$key]['label'] = $value->name;
            $total = Votes::whereCandidatesId($value->id)->count() / Votes::whereIn('candidates_id',[1,2,3])->count() * 100;
            $vote_candidate = substr((string) $total,0,4);
            $data[$key]['value'] = $vote_candidate;
        }

        echo json_encode($data);
        exit();
    }

    public function instagramImage()
    {
        $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1831503549.12029aa.24afa1403eb543e2b6e051fa5beeb6a0';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $json_result = json_decode($result);
        $data = [];
        $flag = 0;
        foreach ($json_result->data as $key => $value) {
            if ($value->type == "image") {
                $flag++;
                $data[$flag]['image'] = $value->images->standard_resolution;
                $data[$flag]['caption'] = $value->caption->text;
                $data[$flag]['created_at'] = date("d-F-Y", $value->created_time);
                $data[$flag]['type'] = $value->type;
            }
        }
        return view('frontend.index')->with('data', $data);
    }

    public function instagramVideo()
    {
        $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1831503549.12029aa.24afa1403eb543e2b6e051fa5beeb6a0';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $json_result = json_decode($result);
        $data = [];
        $flag = 0;
        foreach ($json_result->data as $key => $value) {
            if ($value->type == "video") {
                $flag++;
                $data[$flag]['image'] = $value->images->standard_resolution;
                $data[$flag]['caption'] = $value->caption->text;
                $data[$flag]['created_at'] = date("d-F-Y", $value->created_time);
                $data[$flag]['type'] = $value->type;
                $data[$flag]['video'] = $value->videos->standard_resolution;
            }
        }
        return view('frontend.index')->with('data', $data);
    }

    public function instagramPage()
    {
        $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=1831503549.12029aa.24afa1403eb543e2b6e051fa5beeb6a0';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $json_result = json_decode($result);
        $data = [];
        $flag = 0;
        foreach ($json_result->data as $key => $value) {
                $flag++;
                $data[$flag]['image'] = $value->images->standard_resolution;
                $data[$flag]['caption'] = $value->caption->text;
                $data[$flag]['created_at'] = date("d-F-Y", $value->created_time);
                $data[$flag]['type'] = $value->type;
            if ($value->type == "video") {
                $data[$flag]['video'] = $value->videos->standard_resolution;
            }
        }
        return view('frontend.index')->with('data', $data);
    }
}
