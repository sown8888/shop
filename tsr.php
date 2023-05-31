<?php
	$url = 'https://thesieure.com/chargingws/v2';
	$partner_id = '2828078461';
	$partner_key = 'c90bd4eb96a6deb45fcfe6d734a31138';
	
	
function creatSign($partner_key, $params) {
        $data = array();
        $data['request_id'] = $params['request_id'];
        $data['code'] = $params['code'];
        $data['partner_id'] = $params['partner_id'];
        $data['serial'] = $params['serial'];
        $data['telco'] = $params['telco'];
        $data['command'] = $params['command'];
        ksort($data);
        $sign = $partner_key;
        foreach ($data as $item) {
            $sign .= $item;
        }

        return md5($sign);
    }
?>