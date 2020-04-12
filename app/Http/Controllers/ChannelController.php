<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Channels\UpdateChannelRequest;
use App\Channel;

class ChannelController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only('update');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        $videos = $channel->videos()->paginate(5);
        return view('channels.show', compact('channel', 'videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        if($request->hasFile('image')){

            $channel->clearMediaCollection('images');

            $channel->addMediaFromRequest('image')
                    ->toMediaCollection('images');
        }

        $channel->update([
            'name'  => $request->name,
            'description'   => $request->description
        ]);

        return redirect()->back();
    }
}
