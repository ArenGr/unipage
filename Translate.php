<?php

class Translate
{

    /**
     * @param $input_data
     * @param $lang
     * @return mixed|string
     */
    static function translate_text($input_data, $lang)
    {
        $post_data = array(
            'key' => Config::API_KEY,
            'text' => $input_data,
            'lang' => $lang,
            'format' => 'plain',
            'options' => 1
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::YANDEX_TRANSLATE,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_POSTFIELDS => http_build_query($post_data,'','&'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".Config::TOKEN,
                "content-type: application/json"
            ),
        ));

        $response_data = curl_exec($curl);

        if (curl_errno($curl)) {
            return curl_error($curl);
        }

        curl_close($curl);

        return json_decode($response_data, true);
    }
}
