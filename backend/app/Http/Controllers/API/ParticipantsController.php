<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidFormRequest;
use App\Models\Participants;

class ParticipantsController extends Controller
{
    const IS_ATTENDANCE_FLAG = 1;
    const GROOM_FLAG = 1;

    const IS_ATTENDANCE = '出席';
    const NOT_ATTENDANCE = '欠席';

    const GROOM = '新郎側';
    const BRIDE = '新婦側';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participants::all();

        // DBの値を変換
        foreach($participants as $participant) {
            if ($participant->attendance === self::IS_ATTENDANCE_FLAG) {
                $participant->attendance = self::IS_ATTENDANCE;
            } else {
                $participant->attendance = self::NOT_ATTENDANCE;
            }
            if ($participant->guest_type === self::GROOM_FLAG) {
                $participant->guest_type = self::GROOM;
            } else {
                $participant->guest_type = self::BRIDE;
            }
        }

        return response()->json($participants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidFormRequest $request)
    {
        $status = 200;
        $message = null;

        $data = $request->all();
        $participant = new Participants();
        $participant->fill($data)->save();

        return response()->json(['status' => $status, 'message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $params = $request->all();
        for ($i = 0; $i < $params['count']; $i++) {
            $max_id = Participants::max('id');
            Participants::where('id', $max_id)->delete();
        }

    }
}
