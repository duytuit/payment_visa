<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class Utils
{
    const FILE_MIME_TYPES = [
        'jpeg',
        'jpg',
        'gif',
        'png',
        'svg'
    ];
    const current_nationality  = [
        'AND' =>'Andorra',
        'ARG' =>'Argentina',
        'ARM' =>'Armenia',
        'AUS' =>'Australia',
        'AUT' =>'Austria',
        'AZE' =>'Azerbaijan',
        'BLR' =>'Belarus',
        'BEL' =>'Belgium',
        'BIH' =>'Bosnia',
        'BRA' =>'Brazil',
        'BRN' =>'Bruney',
        'BGR' =>'Bulgaria',
        'CAN' =>'Canada',
        'CHL' =>'Chile',
        'CHN' =>'China',
        'COL' =>'Colombia',
        'HRV' =>'Croatia',
        'CUB' =>'Cuba',
        'CYP' =>'Cyprus',
        'CZE' =>'Czech',
        'DNK' =>'Denmark',
        'EST' =>'Estonia',
        'FJI' =>'Fiji',
        'FIN' =>'Finland',
        'FRA' =>'France',
        'GEO' =>'Georgia',
        'D' =>'Germany',
        'GRC' =>'Greece',
        'HUN' =>'Hungary',
        'ISL' =>'Iceland',
        'IND' =>'India',
        'IRL' =>'Ireland',
        'ITA' =>'Italy',
        'JPN' =>'Japan',
        'KAZ' =>'Kazakhstan',
        'KOR' =>'Korea',
        'LVA' =>'Latvia',
        'LIE' =>'Liechtenstein',
        'LTU' =>'Lithuania',
        'LUX' =>'Luxembourg',
        'MKD' =>'Macedonia',
        'MLT' =>'Malta',
        'MHL' =>'Marshall',
        'MEX' =>'Mexico',
        'FSM' =>'Micronesia',
        'MDA' =>'Moldova',
        'MCO' =>'Monaco',
        'MNG' =>'Mongolia',
        'MNE' =>'Montenegro',
        'MMR' =>'Myanmar',
        'NRU' =>'Nauru',
        'NLD' =>'Netherland',
        'NZL' =>'New',
        'NOR' =>'Norway',
        'PLW' =>'Palau',
        'PAN' =>'Panama',
        'PNG' =>'Papua',
        'PER' =>'Peru',
        'PHL' =>'Philippines',
        'POL' =>'Poland',
        'PRT' =>'Portugal',
        'QAT' =>'Qatar',
        'ROU' =>'Romania',
        'RUS' =>'Russia',
        'SMR' =>'San',
        'SRB' =>'Serbia',
        'SVK' =>'Slovakia',
        'SVN' =>'Slovenia',
        'SLB' =>'Solomon',
        'ESP' =>'Spain',
        'SWE' =>'Sweden',
        'CHE' =>'Switzerland',
        'TLS' =>'Timor',
        'ARE' =>'United',
        'GBR' =>'United',
        'USA' =>'United',
        'URY' =>'Uruguay',
        'VUT' =>'Vanuatu',
        'VEN' =>'Venezuela',
        'WSM' =>'Western'
    ];
    const passport_type  = [
        'NG' =>'Diplomatic passport',
        'CV' =>'Official passport',
        'PT' =>'Ordinary passport',
    ];
    const purpose_of_entry  = [
        '6' =>'aid activities',
        '25' =>'air crewman',
        '104' =>'ashore to the country',
        '102' =>'board the ship to return home',
        '3' =>'business activities',
        '78' =>'dealing with problem',
        '38' =>'diplomat',
        '22' =>'for volunteer',
        '59' =>'internship',
        '7' =>'investment',
        '8' =>'journalism',
        '10' =>'labor, employment',
        '89' =>'lawyer',
        '19' =>'office / orgarnization of economy, culture, technology, non-government',
        '1' =>'official visit',
        '0' =>'other',
        '82' =>'participate in sport competitions',
        '41' =>'personal / private',
        '103' =>'playing fooball',
        '12' =>'study',
        '4' =>'summit, conference',
        '90' =>'take Seagame 31',
        '101' =>'teaching',
        '69' =>'to participate Asian Physics Olympic',
        '76' =>'tourism',
        '2' =>'tourism',
        '55' =>'tourism, visiting relatives',
        '33' =>'transit travel',
        '5' =>'visiting relatives',
        '44' =>'working'
    ];
    const city_province  = [
        '805' =>'AN GIANG',
        '717' =>'BA RIA - VUNG TAU',
        '221' =>'BAC GIANG',
        '207' =>'BAC KAN',
        '821' =>'BAC LIEU',
        '223' =>'BAC NINH',
        '811' =>'BEN TRE',
        '507' =>'BINH DINH',
        '711' =>'BINH DUONG',
        '707' =>'BINH PHUOC',
        '715' =>'BINH THUAN',
        '823' =>'CA MAU',
        '815' =>'CAN THO',
        '203' =>'CAO BANG',
        '501' =>'DA NANG City',
        '605' =>'DAK LAK',
        '606' =>'DAK NONG',
        '302' =>'DIEN BIEN',
        '713' =>'DONG NAI',
        '803' =>'DONG THAP',
        '603' =>'GIA LAI',
        '201' =>'HA GIANG',
        '111' =>'HA NAM',
        '101' =>'HA NOI City',
        '405' =>'HA TINH',
        '107' =>'HAI DUONG',
        '103' =>'HAI PHONG',
        '816' =>'HAU GIANG',
        '701' =>'HO CHI MINH City',
        '305' =>'HOA BINH',
        '109' =>'HUNG YEN',
        '511' =>'KHANH HOA',
        '813' =>'KIEN GIANG',
        '601' =>'KON TUM',
        '301' =>'LAI CHAU',
        '703' =>'LAM DONG',
        '209' =>'LANG SON',
        '205' =>'LAO CAI',
        '801' =>'LONG AN',
        '113' =>'NAM DINH',
        '403' =>'NGHE AN',
        '117' =>'NINH BINH',
        '705' =>'NINH THUAN',
        '217' =>'PHU THO',
        '509' =>'PHU YEN',
        '407' =>'QUANG BINH',
        '503' =>'QUANG NAM',
        '505' =>'QUANG NGAI',
        '225' =>'QUANG NINH',
        '409' =>'QUANG TRI',
        '819' =>'SOC TRANG',
        '303' =>'SON LA',
        '709' =>'TAY NINH',
        '115' =>'THAI BINH',
        '215' =>'THAI NGUYEN',
        '401' =>'THANH HOA',
        '411' =>'THUA THIEN -HUE',
        '807' =>'TIEN GIANG',
        '817' =>'TRA VINH',
        '211' =>'TUYEN QUANG',
        '809' =>'VINH LONG',
        '219' =>'VINH PHUC',
        '213' =>'YEN BAI'
    ];
    const entry_through_checkpoint   = [
        'STS' =>'Tan Son Nhat Int Airport (Ho Chi Minh City)',
        'SPQ' =>'Phu Quoc International Airport',
        'SPB' =>'Phu Bai Int Airport',
        'SNB' =>'Noi Bai Int Airport (Ha Noi)',
        'SVD' =>'Van Don Int Airport (Quang Ninh)',
        'SCT' =>'Can Tho International Airport',
        'SCR' =>'Cam Ranh Int Airport (Khanh Hoa)',
        'SCB' =>'Cat Bi Int Airport (Hai Phong)',
        'SDN' =>'Da Nang International Airport',
        'KLB' =>'Lao Bao Landport',
        'KXM' =>'Xa Mat Landport',
        'KTR' =>'Tay Trang Landport',
        'KTB' =>'Tinh Bien Landport',
        'KST' =>'Song Tien Landport',
        'KNM' =>'Na Meo Landport',
        'KNC' =>'Nam Can Landport',
        'KMC' =>'Mong Cai Landport',
        'KMB' =>'Moc Bai Landport',
        'KLL' =>'La Lay Landport',
        'KLC' =>'Lao Cai Landport',
        'KHT' =>'Ha Tien Landport',
        'KHN' =>'Huu Nghi Landport',
        'KBY' =>'Bo Y Landport',
        'KCL' =>'Cha Lo Landport',
        'KCT' =>'Cau Treo Landport',
        'CNS' =>'Nghi Son Seaport',
        'CCM' =>'Chan May Seaport',
        'CCP' =>'Cam Pha Seaport',
        'CNT' =>'Nha Trang Seaport',
        'CDN' =>'Da Nang Seaport',
        'CDO' =>'Duong Dong Seaport',
        'CQN' =>'Quy Nhon Seaport',
        'CHG' =>'Hon Gai Seaport',
        'CHP' =>'Hai Phong Seaport',
        'CVT' =>'Vung Tau Seaport',
        'CVA' =>'Vung Ang Seaport',
        'CSG' =>'Ho Chi Minh City Seaport',
        'CDQ' =>'Dung Quat Seaport'
    ];
    public static function generateCaptcha(){
        $captcha_code = '';
        $captcha_image_height = 50;
        $captcha_image_width = 130;
        $total_characters_on_image = 4;

//The characters that can be used in the CAPTCHA code.
//avoid all confusing characters and numbers (For example: l, 1 and i)
        $possible_captcha_letters = '23456789';
        $captcha_font = public_path('files/arial.ttf');

        $random_captcha_dots = 50;
        $random_captcha_lines = 25;
        $captcha_text_color = "0x142864";
        $captcha_noise_color = "0x142864";


        $count = 0;
        while ($count < $total_characters_on_image) {
            $captcha_code .= substr(
                $possible_captcha_letters,
                mt_rand(0, strlen($possible_captcha_letters)-1),
                1);
            $count++;
        }

        $captcha_font_size = $captcha_image_height * 0.65;
        $captcha_image = @imagecreate(
            $captcha_image_width,
            $captcha_image_height
        );

        /* setting the background, text and noise colours here */
        $background_color = imagecolorallocate(
            $captcha_image,
            255,
            255,
            255
        );

        $array_text_color = self::hextorgb($captcha_text_color);
        $captcha_text_color = imagecolorallocate(
            $captcha_image,
            $array_text_color['red'],
            $array_text_color['green'],
            $array_text_color['blue']
        );

        $array_noise_color = self::hextorgb($captcha_noise_color);
        $image_noise_color = imagecolorallocate(
            $captcha_image,
            $array_noise_color['red'],
            $array_noise_color['green'],
            $array_noise_color['blue']
        );

        /* Generate random dots in background of the captcha image */
        for( $count=0; $count<$random_captcha_dots; $count++ ) {
            imagefilledellipse(
                $captcha_image,
                mt_rand(0,$captcha_image_width),
                mt_rand(0,$captcha_image_height),
                2,
                3,
                $image_noise_color
            );
        }

        /* Generate random lines in background of the captcha image */
        for( $count=0; $count<$random_captcha_lines; $count++ ) {
            imageline(
                $captcha_image,
                mt_rand(0,$captcha_image_width),
                mt_rand(0,$captcha_image_height),
                mt_rand(0,$captcha_image_width),
                mt_rand(0,$captcha_image_height),
                $image_noise_color
            );
        }

        /* Create a text box and add 6 captcha letters code in it */
        $text_box = imagettfbbox(
            $captcha_font_size,
            0,
            $captcha_font,
            $captcha_code
        );
        $x = ($captcha_image_width - $text_box[4])/2;
        $y = ($captcha_image_height - $text_box[5])/2;
        imagettftext(
            $captcha_image,
            $captcha_font_size,
            0,
            $x,
            $y,
            $captcha_text_color,
            $captcha_font,
            $captcha_code
        );
        Session::put( 'captcha', $captcha_code);
        ob_start();
        imagejpeg($captcha_image); //showing the image
        $img = ob_get_clean();
        ob_end_clean();
         // Free up memory
        imagedestroy($captcha_image);
        return 'data:image/' . 'png' . ';base64,'.base64_encode($img);
    }
    private static function hextorgb($hexstring){
        $integar = hexdec($hexstring);
        return array("red" => 0xFF & ($integar >> 0x10),
            "green" => 0xFF & ($integar >> 0x8),
            "blue" => 0xFF & $integar);
    }
    public static function getRandom($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }
    // const list_bank_atm = [
    //     ["methodCode"=>"ATM_ON", "bankFullName"=>"Ngân hàng VPBank","tradeName"=>"VPBank","bankCode"=>"VPBANK","urlBankLogo"=>"/bank_logo/2017/1/11/-vcb.jpg","bankId"=>31],
    //     ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Xuất Nhập Khẩu Việt Nam","tradeName"=>"Eximbank","bankCode"=>"EXIMBANK","urlBankLogo"=>"/avatar/2016/12/19/-eximbank.png","bankId"=>91],
    //     ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Hàng Hải Việt Nam","tradeName"=>"MSB","bankCode"=>"MSB","urlBankLogo"=>"/bank_logo/2017/5/9/1494319796912maritimebank.jpg","bankId"=>98],
    //     ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Nam Á","tradeName"=>"NH TMCP Nam Á","bankCode"=>"NAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320669772namabank.png","bankId"=>104],
    //     ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP An Bình","tradeName"=>"AnBinh","bankCode"=>"ABB","urlBankLogo"=>"/bank_logo/2017/5/9/1494321243248anbinhbank.png","bankId"=>108],
    //     ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Việt Á","tradeName"=>"NH TMCP Việt Á","bankCode"=>"VAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317921939vietabank.png","bankId"=>97],
    // ];
    // const list_bank_transfer_online = [
    //     ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Kỹ Thương Việt Nam","tradeName"=>"Ngân hàng Kỹ Thương Việt Nam","bankCode"=>"TECHCOMBANK","urlBankLogo"=>"/bank_logo/2019/12/5/1575517867333techcombank.png","bankId"=>2],
    // ];
    // const list_bank_qr_code = [
    //     ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Nam Á","tradeName"=>"OCB","bankCode"=>"NAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320669772namabank.png","bankId"=>104],
    // ];
    // const list_bank_va = [
    //     ["methodCode"=>"IB_ON","bankFullName"=>"NH TMCP Xuất Nhập Khẩu Việt Nam","tradeName"=>"Eximbank","bankCode"=>"EXIMBANK","urlBankLogo"=>"/avatar/2016/12/19/-eximbank.png","bankId"=>91],
    //     ["methodCode"=>"ATM","bankFullName"=>"NH TMCP Nam Á","tradeName"=>"NH TMCP Nam Á","bankCode"=>"NAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320669772namabank.png","bankId"=>104],
    //     ["methodCode"=>"VA","bankFullName"=>"NH TMCP Hàng Hải Việt Nam","tradeName"=>"NH TMCP Hàng Hải Việt Nam","bankCode"=>"MSB","urlBankLogo"=>"/bank_logo/2017/5/9/1494319796912maritimebank.jpg","bankId"=>98],
    //     ["methodCode"=>"VA","bankFullName"=>"NH TMCP Đông Nam Á","tradeName"=>"NH TMCP Đông Nam Á","bankCode"=>"SEABANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320788232seabank.png","bankId"=>105]
    // ];
    const list_bank_atm = [
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Ngoại Thương Việt Nam","tradeName"=>"NH TMCP Ngoại Thương Việt Nam","bankCode"=>"VCB","urlBankLogo"=>"/bank_logo/2019/1/15/1547536467073logo-vcb.png","bankId"=>20],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Quân Đội","tradeName"=>"NH TMCP Quân Đội","bankCode"=>"MB","urlBankLogo"=>"/bank_logo/2021/10/8/1633706017156logo_mb_new.png","bankId"=>41],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Công Thương Việt Nam","tradeName"=>"NH TMCP Công Thương Việt Nam","bankCode"=>"VIETINBANK","urlBankLogo"=>"/bank_logo/2017/12/20/1513746830788vietinbank.png","bankId"=>4],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH Dầu khí toàn cầu","tradeName"=>"NH Dầu khí toàn cầu","bankCode"=>"GPB","urlBankLogo"=>"/bank_logo/2017/5/17/1495004799093gpbank.png","bankId"=>52],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TM TNHH MTV Đại Dương","tradeName"=>"NH TM TNHH MTV Đại Dương","bankCode"=>"OCEANBANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320926576oceanbank.jpeg","bankId"=>45],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP An Bình","tradeName"=>"NH TMCP An Bình","bankCode"=>"ABB","urlBankLogo"=>"/bank_logo/2017/5/9/1494321243248anbinhbank.png","bankId"=>47],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Sài Gòn Hà Nội","tradeName"=>"NH TMCP Sài Gòn Hà Nội","bankCode"=>"SHB","urlBankLogo"=>"/bank_logo/2017/5/9/1494319958358shb.png","bankId"=>38],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH Bưu Điện Liên Việt","tradeName"=>"NH Bưu Điện Liên Việt","bankCode"=>"LVB","urlBankLogo"=>"/bank_logo/2017/5/17/1495004573673lienviet.png","bankId"=>51],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Tiên Phong","tradeName"=>"NH TMCP Tiên Phong","bankCode"=>"TPB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317354112tpbank.jpg","bankId"=>35],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH Nông Nghiệp và Phát triển Nông thôn Việt Nam","tradeName"=>"NH Nông Nghiệp và Phát triển Nông thôn Việt Nam","bankCode"=>"AGB","urlBankLogo"=>"/bank_logo/2017/5/9/1494321556132agribank.jpeg","bankId"=>49],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Đông Nam Á","tradeName"=>"NH TMCP Đông Nam Á","bankCode"=>"SEABANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320788232seabank.png","bankId"=>44],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Nam Á","tradeName"=>"NH TMCP Nam Á","bankCode"=>"NAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320669772namabank.png","bankId"=>43],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP xăng dầu petrolimex","tradeName"=>"NH TMCP xăng dầu petrolimex","bankCode"=>"PGB","urlBankLogo"=>"/bank_logo/2017/5/31/1496218170568pgbank.jpeg","bankId"=>59],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Việt Nam Thương Tín","tradeName"=>"NH TMCP Việt Nam Thương Tín","bankCode"=>"VB","urlBankLogo"=>"/bank_logo/2019/1/15/1547539661451logo-vietbank.jpg","bankId"=>73],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Đầu Tư và Phát Triển Việt Nam","tradeName"=>"NH TMCP Đầu Từ và Phát Triền Việt Nam","bankCode"=>"BIDV","urlBankLogo"=>"/bank_logo/2017/5/9/1494321110425bidv.png","bankId"=>46],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Á Châu","tradeName"=>"NH TMCP Á Châu","bankCode"=>"ACB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317997875logo-ngan-hang-a-chau-acb.jpg","bankId"=>7],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Sài Gòn Thương Tín","tradeName"=>"Sacombank","bankCode"=>"SACOMBANK","urlBankLogo"=>"/avatar/2016/12/19/-sacombank.png","bankId"=>31],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Sài Gòn Công Thương","tradeName"=>"NH TMCP Sài Gòn Công Thương","bankCode"=>"SGB","urlBankLogo"=>"/bank_logo/2018/2/24/1519440123116saigonbank.jpg","bankId"=>42],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Kỹ thương Việt Nam","tradeName"=>"NH TMCP Kỹ thương Việt Nam","bankCode"=>"TECHCOMBANK","urlBankLogo"=>"/bank_logo/2021/3/17/1615973143428download.png","bankId"=>1],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Việt Á","tradeName"=>"NH TMCP Việt Á","bankCode"=>"VAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317921939vietabank.png","bankId"=>36],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH Quốc tế","tradeName"=>"NH Quốc tế","bankCode"=>"VIB","urlBankLogo"=>"/avatar/2016/12/19/-vibbank.png","bankId"=>16],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Việt Nam Thịnh Vượng","tradeName"=>"NH TMCP Việt Nam Thịnh Vượng","bankCode"=>"VPBANK","urlBankLogo"=>"/avatar/2016/12/19/-vpbank.png","bankId"=>11],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Xuất Nhập Khẩu","tradeName"=>"NH TMCP Xuất Nhập Khẩu","bankCode"=>"EXIMBANK","urlBankLogo"=>"/avatar/2016/12/19/-eximbank.png","bankId"=>14],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Hàng Hải","tradeName"=>"NH TMCP Hàng Hải","bankCode"=>"MARITIMEBANK","urlBankLogo"=>"/avatar/2016/12/19/-maritimebank.png","bankId"=>15],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Phát triển nhà TP HCM","tradeName"=>"NH TMCP Phát triển nhà TP HCM","bankCode"=>"HDB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320099844hdbank.png","bankId"=>39],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH Bắc Á","tradeName"=>"NH Bắc Á","bankCode"=>"BAB","urlBankLogo"=>"/bank_logo/2017/5/6/1494035670925220856bacabank.png","bankId"=>34],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH Phương Đông","tradeName"=>"NH Phương Đông","bankCode"=>"OCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496216867760ocb.png","bankId"=>54],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Đông Á","tradeName"=>"NH TMCP Đông Á","bankCode"=>"DAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320202947donga-bank.png","bankId"=>40],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TNHH MTV Shinhan Việt Nam","tradeName"=>"NH TNHH MTV Shinhan Việt Nam","bankCode"=>"SHINHANBANK","urlBankLogo"=>"/avatar/2016/12/19/-shinhan.png","bankId"=>13],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Bản Việt","tradeName"=>"NH TMCP Bản Việt","bankCode"=>"BVB","urlBankLogo"=>"/bank_logo/2019/12/25/1577238719261logo__vccb.png","bankId"=>56],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Sài Gòn","tradeName"=>"NH TMCP Sài Gòn","bankCode"=>"SCB","urlBankLogo"=>"/bank_logo/2017/4/28/1493348681705a1.png","bankId"=>30],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Quốc Dân","tradeName"=>"NH TMCP Quốc Dân","bankCode"=>"NCB","urlBankLogo"=>"/bank_logo/2017/5/3/1493805742971nhqd_45d37.jpg","bankId"=>32],
        ["methodCode"=>"ATM_ON","bankFullName"=>"NH TMCP Đại chúng","tradeName"=>"PVcombank","bankCode"=>"PVCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496220222335pvcombank.png","bankId"=>63],

    ];
    const list_bank_transfer_online = [
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Đại chúng","tradeName"=>"NH TMCP Đại Chúng","bankCode"=>"PVCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496220222335pvcombank.png","bankId"=>63],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Công Thương Việt Nam","tradeName"=>"NH TMCP Công Thương Việt Nam","bankCode"=>"VIETINBANK","urlBankLogo"=>"/bank_logo/2017/12/20/1513746830788vietinbank.png","bankId"=>4],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH Phương Đông","tradeName"=>"NH Phương Đông","bankCode"=>"OCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496216867760ocb.png","bankId"=>54],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Tiên Phong","tradeName"=>"NH TMCP Tiên Phong","bankCode"=>"TPB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317354112tpbank.jpg","bankId"=>35],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Việt Nam Thịnh Vượng","tradeName"=>"NH TMCP Việt Nam Thịnh Vượng","bankCode"=>"VPBANK","urlBankLogo"=>"/avatar/2016/12/19/-vpbank.png","bankId"=>11],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Sài Gòn Thương Tín","tradeName"=>"NH TMCP Sài Gòn Thương Tín","bankCode"=>"SACOMBANK","urlBankLogo"=>"/avatar/2016/12/19/-sacombank.png","bankId"=>31],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Kỹ thương Việt Nam","tradeName"=>"NH TMCP Kỹ thương Việt Nam","bankCode"=>"TECHCOMBANK","urlBankLogo"=>"/bank_logo/2021/3/17/1615973143428download.png","bankId"=>1],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Ngoại Thương Việt Nam","tradeName"=>"NH TMCP Ngoại Thương Việt Nam","bankCode"=>"VCB","urlBankLogo"=>"/bank_logo/2019/1/15/1547536467073logo-vcb.png","bankId"=>20],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH Bắc Á","tradeName"=>"NH Bắc Á","bankCode"=>"BAB","urlBankLogo"=>"/bank_logo/2017/5/6/1494035670925220856bacabank.png","bankId"=>34],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TM TNHH MTV Đại Dương","tradeName"=>"NH TM TNHH MTV Đại Dương","bankCode"=>"OCEANBANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320926576oceanbank.jpeg","bankId"=>45],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Quốc Dân","tradeName"=>"NH TMCP Quốc Dân","bankCode"=>"NCB","urlBankLogo"=>"/bank_logo/2017/5/3/1493805742971nhqd_45d37.jpg","bankId"=>32],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Phát triển nhà TP HCM","tradeName"=>"NH TMCP Phát triển nhà TP HCM","bankCode"=>"HDB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320099844hdbank.png","bankId"=>39],
        ["methodCode"=>"BANK_TRANSFER_ONLINE","bankFullName"=>"NH TMCP Đông Á","tradeName"=>"NH TMCP Đông Á","bankCode"=>"DAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320202947donga-bank.png","bankId"=>40],

    ];
    const list_bank_qr_code = [
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Ngoại Thương Việt Nam","tradeName"=>"NH TMCP Ngoại Thương Việt Nam","bankCode"=>"VCB","urlBankLogo"=>"/bank_logo/2019/1/15/1547536467073logo-vcb.png","bankId"=>20],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Quân Đội","tradeName"=>"NH TMCP Quân Đội","bankCode"=>"MB","urlBankLogo"=>"/bank_logo/2021/10/8/1633706017156logo_mb_new.png","bankId"=>41],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Công Thương Việt Nam","tradeName"=>"NH TMCP Công Thương Việt Nam","bankCode"=>"VIETINBANK","urlBankLogo"=>"/bank_logo/2017/12/20/1513746830788vietinbank.png","bankId"=>4],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TM TNHH MTV Đại Dương","tradeName"=>"NH TM TNHH MTV Đại Dương","bankCode"=>"OCEANBANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320926576oceanbank.jpeg","bankId"=>45],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP An Bình","tradeName"=>"NH TMCP An Bình","bankCode"=>"ABB","urlBankLogo"=>"/bank_logo/2017/5/9/1494321243248anbinhbank.png","bankId"=>47],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Sài Gòn Hà Nội","tradeName"=>"NH TMCP Sài Gòn Hà Nội","bankCode"=>"SHB","urlBankLogo"=>"/bank_logo/2017/5/9/1494319958358shb.png","bankId"=>38],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Tiên Phong","tradeName"=>"NH TMCP Tiên Phong","bankCode"=>"TPB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317354112tpbank.jpg","bankId"=>35],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH Nông Nghiệp và Phát triển Nông thôn Việt Nam","tradeName"=>"NH Nông Nghiệp và Phát triển Nông thôn Việt Nam","bankCode"=>"AGB","urlBankLogo"=>"/bank_logo/2017/5/9/1494321556132agribank.jpeg","bankId"=>49],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Việt Nam Thương Tín","tradeName"=>"NH TMCP Việt Nam Thương Tín","bankCode"=>"VB","urlBankLogo"=>"/bank_logo/2019/1/15/1547539661451logo-vietbank.jpg","bankId"=>73],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Nam Á","tradeName"=>"NH TMCP Nam Á","bankCode"=>"NAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320669772namabank.png","bankId"=>43],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH Bắc Á","tradeName"=>"Nh Bắc Á","bankCode"=>"BAB","urlBankLogo"=>"/bank_logo/2017/5/6/1494035670925220856bacabank.png","bankId"=>34],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Sài Gòn","tradeName"=>"NH TMCP Sài Gòn","bankCode"=>"SCB","urlBankLogo"=>"/bank_logo/2017/4/28/1493348681705a1.png","bankId"=>30],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TNHH MTV Shinhan Việt Nam","tradeName"=>"NH TNHH MTV Shinhan Việt Nam","bankCode"=>"SHINHANBANK","urlBankLogo"=>"/avatar/2016/12/19/-shinhan.png","bankId"=>13],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Kiên Long","tradeName"=>"NH TMCP Kiên Long","bankCode"=>"KLB","urlBankLogo"=>"/bank_logo/2017/5/31/1496222641146kienlong.jpeg","bankId"=>66],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Á Châu","tradeName"=>"NH TMCP Á Châu","bankCode"=>"ACB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317997875logo-ngan-hang-a-chau-acb.jpg","bankId"=>7],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Việt Á","tradeName"=>"NH TMCP Việt Á","bankCode"=>"VAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317921939vietabank.png","bankId"=>36],
        ["methodCode"=>"QRCODE","bankFullName"=>"Ngân hàng Bảo Việt","tradeName"=>"NH Bảo Việt","bankCode"=>"BAOVIETBANK","urlBankLogo"=>"/bank_logo/2019/7/18/1563436177995logo_baovietbank.png","bankId"=>79],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Đầu Tư và Phát Triển Việt Nam","tradeName"=>"NH TMCP Đầu Tư và Phát Triển Việt Nam","bankCode"=>"BIDV","urlBankLogo"=>"/bank_logo/2017/5/9/1494321110425bidv.png","bankId"=>46],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Quốc Dân","tradeName"=>"NH TMCP Quốc Dân","bankCode"=>"NCB","urlBankLogo"=>"/bank_logo/2017/5/3/1493805742971nhqd_45d37.jpg","bankId"=>32],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TNHH Indovina","tradeName"=>"NH TNHH Indovina","bankCode"=>"IDVN","urlBankLogo"=>"/bank_logo/2017/5/31/1496217175316indovina.jpeg","bankId"=>55],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Hàng Hải","tradeName"=>"NH TMCP Hàng Hải","bankCode"=>"MARITIMEBANK","urlBankLogo"=>"/avatar/2016/12/19/-maritimebank.png","bankId"=>15],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Đại Chúng Việt Nam","tradeName"=>"NH TMCP Đại Chúng Việt Nam","bankCode"=>"PVFC","urlBankLogo"=>"/bank_logo/2017/6/29/1498710648006pvcom-logo.png","bankId"=>67],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Xuất Nhập Khẩu","tradeName"=>"NH TMCP Xuất Nhập Khẩu","bankCode"=>"EXIMBANK","urlBankLogo"=>"/avatar/2016/12/19/-eximbank.png","bankId"=>14],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Bản Việt","tradeName"=>"NH TMCP Bản Việt","bankCode"=>"BVB","urlBankLogo"=>"/bank_logo/2019/12/25/1577238719261logo__vccb.png","bankId"=>56],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH Phương Đông","tradeName"=>"NH Phương Đông","bankCode"=>"OCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496216867760ocb.png","bankId"=>54],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Phát triển nhà TP HCM","tradeName"=>"NH TMCP Phát triển nhà TP HCM","bankCode"=>"HDB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320099844hdbank.png","bankId"=>39],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TNHH MTV Woori Việt Nam","tradeName"=>"NH TNHH MTV Woori Việt Nam","bankCode"=>"WB","urlBankLogo"=>"/bank_logo/2019/1/15/1547539966292logo-woori-bank.jpg","bankId"=>74],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Sài Gòn Công Thương","tradeName"=>"NH TMCP Sài Gòn Công Thương","bankCode"=>"SGB","urlBankLogo"=>"/bank_logo/2018/2/24/1519440123116saigonbank.jpg","bankId"=>42],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Kỹ thương Việt Nam","tradeName"=>"NH TMCP Kỹ Thương Việt Nam","bankCode"=>"TECHCOMBANK","urlBankLogo"=>"/bank_logo/2021/3/17/1615973143428download.png","bankId"=>1],
        ["methodCode"=>"QRCODE","bankFullName"=>"VinID","tradeName"=>"VinID","bankCode"=>"VINID","urlBankLogo"=>"/bank_logo/2020/1/14/1578989128337logo-vinid.png","bankId"=>84],
        ["methodCode"=>"QRCODE","bankFullName"=>"Viettel money","tradeName"=>"Viettel money","bankCode"=>"VIETTELMONEY","urlBankLogo"=>"/bank_logo/2022/5/4/1651653679360viettel_money_red_390_150_logo.png","bankId"=>92],
        ["methodCode"=>"QRCODE","bankFullName"=>"NH TMCP Sài Gòn Thương Tín","tradeName"=>"NH TMCP Sài Gòn Thương Tín","bankCode"=>"SACOMBANK","urlBankLogo"=>"/avatar/2016/12/19/-sacombank.png","bankId"=>31],

    ];
    const list_bank_va = [
        ["methodCode"=>"IB_ON","bankFullName"=>"NH TMCP Ngoại Thương Việt Nam","tradeName"=>"Vietcombank","bankCode"=>"VCB","urlBankLogo"=>"/bank_logo/2019/1/15/1547536467073logo-vcb.png","bankId"=>20],
        ["methodCode"=>"IB_ON","bankFullName"=>"NH TMCP Đông Á","tradeName"=>"NH TMCP Đông Á","bankCode"=>"DAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320202947donga-bank.png","bankId"=>40],
        ["methodCode"=>"IB_ON","bankFullName"=>"NH Phương Đông","tradeName"=>"NH Phương Đông","bankCode"=>"OCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496216867760ocb.png","bankId"=>54],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Việt Nam Thương Tín","tradeName"=>"NH TMCP Việt Nam Thương Tín","bankCode"=>"VB","urlBankLogo"=>"/bank_logo/2019/1/15/1547539661451logo-vietbank.jpg","bankId"=>73],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Sài Gòn Công Thương","tradeName"=>"NH TMCP Sài Gòn Công Thương","bankCode"=>"SGB","urlBankLogo"=>"/bank_logo/2018/2/24/1519440123116saigonbank.jpg","bankId"=>42],
        ["methodCode"=>"VA","bankFullName"=>"NH Dầu khí toàn cầu","tradeName"=>"NH Dầu khí toàn cầu","bankCode"=>"GPB","urlBankLogo"=>"/bank_logo/2017/5/17/1495004799093gpbank.png","bankId"=>52],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Đông Á","tradeName"=>"NH TMCP Đông Á","bankCode"=>"DAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320202947donga-bank.png","bankId"=>40],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Đông Nam Á","tradeName"=>"NH TMCP Đông Nam Á","bankCode"=>"SEABANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320788232seabank.png","bankId"=>44],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Đại chúng","tradeName"=>"PVcombank","bankCode"=>"PVCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496220222335pvcombank.png","bankId"=>63],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Kiên Long","tradeName"=>"NH TMCP Kiên Long","bankCode"=>"KLB","urlBankLogo"=>"/bank_logo/2017/5/31/1496222641146kienlong.jpeg","bankId"=>66],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP An Bình","tradeName"=>"NH TMCP An Bình","bankCode"=>"ABB","urlBankLogo"=>"/bank_logo/2017/5/9/1494321243248anbinhbank.png","bankId"=>47],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Công Thương Việt Nam","tradeName"=>"NH TMCP Công Thương Việt Nam","bankCode"=>"VIETINBANK","urlBankLogo"=>"/bank_logo/2017/12/20/1513746830788vietinbank.png","bankId"=>4],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Bản Việt","tradeName"=>"NH TMCP Bản Việt","bankCode"=>"BVB","urlBankLogo"=>"/bank_logo/2019/12/25/1577238719261logo__vccb.png","bankId"=>56],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Việt Á","tradeName"=>"NH TMCP Việt Á","bankCode"=>"VAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317921939vietabank.png","bankId"=>36],
        ["methodCode"=>"VA","bankFullName"=>"NH Phương Đông","tradeName"=>"NH Phương Đông","bankCode"=>"OCB","urlBankLogo"=>"/bank_logo/2017/5/31/1496216867760ocb.png","bankId"=>54],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Quân Đội","tradeName"=>"Ngân hàng TMCP Quân Đội","bankCode"=>"MB","urlBankLogo"=>"/bank_logo/2021/10/8/1633706017156logo_mb_new.png","bankId"=>41],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Tiên Phong","tradeName"=>"NH TMCP Tiên Phong","bankCode"=>"TPB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317354112tpbank.jpg","bankId"=>35],
        ["methodCode"=>"VA","bankFullName"=>"NH Nông Nghiệp và Phát triển Nông thôn Việt Nam","tradeName"=>"NH Nông Nghiệp và Phát triển Nông thôn Việt Nam","bankCode"=>"AGB","urlBankLogo"=>"/bank_logo/2017/5/9/1494321556132agribank.jpeg","bankId"=>49],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Việt Nam Thịnh Vượng","tradeName"=>"NH TMCP Việt Nam Thịnh Vượng","bankCode"=>"VPBANK","urlBankLogo"=>"/avatar/2016/12/19/-vpbank.png","bankId"=>11],
        ["methodCode"=>"VA","bankFullName"=>"NH Quốc tế","tradeName"=>"NH Quốc tế","bankCode"=>"VIB","urlBankLogo"=>"/avatar/2016/12/19/-vibbank.png","bankId"=>16],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Sài Gòn Thương Tín","tradeName"=>"NH TMCP Sài Gòn Thương Tín","bankCode"=>"SACOMBANK","urlBankLogo"=>"/avatar/2016/12/19/-sacombank.png","bankId"=>31],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Kỹ thương Việt Nam","tradeName"=>"NH TMCP Kỹ Thương Việt Nam","bankCode"=>"TECHCOMBANK","urlBankLogo"=>"/bank_logo/2021/3/17/1615973143428download.png","bankId"=>1],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Ngoại Thương Việt Nam","tradeName"=>"NH TMCP Ngoại Thương Việt Nam","bankCode"=>"VCB","urlBankLogo"=>"/bank_logo/2019/1/15/1547536467073logo-vcb.png","bankId"=>20],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Xuất Nhập Khẩu","tradeName"=>"NH TMCP Xuất Nhập Khẩu","bankCode"=>"EXIMBANK","urlBankLogo"=>"/avatar/2016/12/19/-eximbank.png","bankId"=>14],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Hàng Hải Việt Nam","tradeName"=>"NH TMCP Hàng Hải Việt Nam","bankCode"=>"MSB","urlBankLogo"=>"/bank_logo/2019/3/6/1551864669313msb-new.png","bankId"=>37],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Đầu Tư và Phát Triển Việt Nam","tradeName"=>"NH TMCP Đầu Từ và Phát Triền Việt Nam","bankCode"=>"BIDV","urlBankLogo"=>"/bank_logo/2017/5/9/1494321110425bidv.png","bankId"=>46],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Á Châu","tradeName"=>"NH TMCP Á Châu","bankCode"=>"ACB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317997875logo-ngan-hang-a-chau-acb.jpg","bankId"=>7],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Nam Á","tradeName"=>"NH TMCP Nam Á","bankCode"=>"NAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320669772namabank.png","bankId"=>43],
        ["methodCode"=>"VA","bankFullName"=>"NH Bắc Á","tradeName"=>"Nh Bắc Á","bankCode"=>"BAB","urlBankLogo"=>"/bank_logo/2017/5/6/1494035670925220856bacabank.png","bankId"=>34],
        ["methodCode"=>"VA","bankFullName"=>"NH TM TNHH MTV Đại Dương","tradeName"=>"NH TM TNHH MTV Đại Dương","bankCode"=>"OCEANBANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320926576oceanbank.jpeg","bankId"=>45],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Sài Gòn","tradeName"=>"NH TMCP Sài Gòn","bankCode"=>"SCB","urlBankLogo"=>"/bank_logo/2017/4/28/1493348681705a1.png","bankId"=>30],
        ["methodCode"=>"VA","bankFullName"=>"NH Bưu Điện Liên Việt","tradeName"=>"NH Bưu Điện Liên Việt","bankCode"=>"LVB","urlBankLogo"=>"/bank_logo/2017/5/17/1495004573673lienviet.png","bankId"=>51],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Sài Gòn Hà Nội","tradeName"=>"NH TMCP Sài Gòn Hà Nội","bankCode"=>"SHB","urlBankLogo"=>"/bank_logo/2017/5/9/1494319958358shb.png","bankId"=>38],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Quốc Dân","tradeName"=>"NH TMCP Quốc Dân","bankCode"=>"NCB","urlBankLogo"=>"/bank_logo/2017/5/3/1493805742971nhqd_45d37.jpg","bankId"=>32],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP Phát triển nhà TP HCM","tradeName"=>"NH TMCP Phát triển nhà TP HCM","bankCode"=>"HDB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320099844hdbank.png","bankId"=>39],
        ["methodCode"=>"VA","bankFullName"=>"NH TMCP xăng dầu petrolimex","tradeName"=>"NH TMCP xăng dầu petrolimex","bankCode"=>"PGB","urlBankLogo"=>"/bank_logo/2017/5/31/1496218170568pgbank.jpeg","bankId"=>59],

    ];
    const list_bank_vietQR = [
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Ngoại Thương Việt Nam","tradeName"=>"NH TMCP Ngoại Thương Việt Nam","bankCode"=>"VCB","urlBankLogo"=>"/bank_logo/2019/1/15/1547536467073logo-vcb.png","bankId"=>20],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Công Thương Việt Nam","tradeName"=>"NH TMCP Công Thương Viet Nam","bankCode"=>"VIETINBANK","urlBankLogo"=>"/bank_logo/2017/12/20/1513746830788vietinbank.png","bankId"=>4],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Á Châu","tradeName"=>"NH TMCP Á Châu","bankCode"=>"ACB","urlBankLogo"=>"/bank_logo/2017/5/9/1494317997875logo-ngan-hang-a-chau-acb.jpg","bankId"=>7],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Sài Gòn Thương Tín","tradeName"=>"NH TMCP Sài Gòn Thương Tín","bankCode"=>"SACOMBANK","urlBankLogo"=>"/avatar/2016/12/19/-sacombank.png","bankId"=>31],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Việt Nam Thịnh Vượng","tradeName"=>"NH TMCP Việt Nam Thịnh Vượng","bankCode"=>"VPBANK","urlBankLogo"=>"/avatar/2016/12/19/-vpbank.png","bankId"=>11],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Nam Á","tradeName"=>"NH TMCP Nam Á","bankCode"=>"NAB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320669772namabank.png","bankId"=>43],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Bản Việt","tradeName"=>"NH TMCP Bản Việt","bankCode"=>"BVB","urlBankLogo"=>"/bank_logo/2019/12/25/1577238719261logo__vccb.png","bankId"=>56],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Hàng Hải Việt Nam","tradeName"=>"NH TMCP Hàng Hải Việt Nam","bankCode"=>"MSB","urlBankLogo"=>"/bank_logo/2019/3/6/1551864669313msb-new.png","bankId"=>37],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP xăng dầu petrolimex","tradeName"=>"NH TMCP xăng dầu petrolimex","bankCode"=>"PGB","urlBankLogo"=>"/bank_logo/2017/5/31/1496218170568pgbank.jpeg","bankId"=>59],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Đại Chúng Việt Nam","tradeName"=>"NH TMCP Đại Chúng Việt Nam","bankCode"=>"PVFC","urlBankLogo"=>"/bank_logo/2017/6/29/1498710648006pvcom-logo.png","bankId"=>67],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Quân Đội","tradeName"=>"NH TMCP Quân Đội","bankCode"=>"MB","urlBankLogo"=>"/bank_logo/2021/10/8/1633706017156logo_mb_new.png","bankId"=>41],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Phát triển nhà TP HCM","tradeName"=>"NH TMCP Phát triển nhà TP HCM","bankCode"=>"HDB","urlBankLogo"=>"/bank_logo/2017/5/9/1494320099844hdbank.png","bankId"=>39],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Quốc Dân","tradeName"=>"NH TMCP Quốc Dân","bankCode"=>"NCB","urlBankLogo"=>"/bank_logo/2017/5/3/1493805742971nhqd_45d37.jpg","bankId"=>32],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Sài Gòn","tradeName"=>"NH TMCP Sài Gòn","bankCode"=>"SCB","urlBankLogo"=>"/bank_logo/2017/4/28/1493348681705a1.png","bankId"=>30],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH Bưu Điện Liên Việt","tradeName"=>"Nh Bưu Điện Liên Việt","bankCode"=>"LVB","urlBankLogo"=>"/bank_logo/2017/5/17/1495004573673lienviet.png","bankId"=>51],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Đông Nam Á","tradeName"=>"NH TMCP Đông Nam Á","bankCode"=>"SEABANK","urlBankLogo"=>"/bank_logo/2017/5/9/1494320788232seabank.png","bankId"=>44],
        ["methodCode"=>"VIETQR","bankFullName"=>"NH TMCP Đầu Tư và Phát Triển Việt Nam","tradeName"=>"NH TMCP Đầu Tư và Phát Triển Việt Nam","bankCode"=>"BIDV","urlBankLogo"=>"/bank_logo/2017/5/9/1494321110425bidv.png","bankId"=>46]
    ];

}
