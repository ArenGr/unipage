<?php

class Index
{
    /**
     * Index constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param $input_data
     * @param $lang
     * @return mixed|string
     */
    public function index($input_data, $lang)
    {
        return Translate::translate_text($input_data, $lang);
    }
}
