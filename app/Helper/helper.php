<?php

function themesetting($user_id)
{
    return \App\Models\ThemeSetting::where('user_id', $user_id)->first();
}
