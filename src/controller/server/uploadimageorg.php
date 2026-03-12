<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../controller/server/functions.php");		// подгружаем функции (мини версия)

function cuttingimg($zoom,$fn,$sz){
    $img=imagecreatefrompng("../../images/maps/".'0-0-0-'.$fn);  // получаем идентификатор загруженного изрбражения которое будем резать
    $info=getimagesize("../../images/maps/".'0-0-0-'.$fn);                          // получаем в массив информацию об изображении
    $w=$info[0];$h=$info[1];    // ширина и высота исходного изображения
    $sx=round($w/$sz,0);        // длинна куска изображения
    $sy=round($h/$sz,0);        // высота куска изображения
    $px=0;$py=0;                // координаты шага "реза"
    //echo "-- $sx,$sy -- $w/$h -- $img !";
    //print_r($info);
    for ($y = 0; $y <= $sz; $y++) {        
        for ($x = 0; $x <= $sz; $x++) {            
             $imgcropped=imagecreatetruecolor($sx,$sy);
             imagecopy($imgcropped,$img,0,0,$px,$py,$sx,$sy);
             imagepng($imgcropped,"../../images/maps/".$zoom."-".$y."-".$x."-".$fn);
             $px=$px+$sx;
             //echo "../../images/maps/".$y."-".$x."-".$fn;
            };
            $px=0;$py=$py+$sy;            
        };
//    return "ok";
};


$geteqid=$_POST['geteqid'];
$uploaddir = '../../images/maps/';

$userfile_name=strtoupper(basename($_FILES['myfile']['name']));
$len=strlen($userfile_name);
$ext_file=substr($userfile_name,$len-4,$len);

if ($ext_file==".PNG"){
    $tmp=GetRandomId(20);
    $userfile_name=$tmp.$ext_file;
    $uploadfile = $uploaddir.'0-0-0-'.$userfile_name;

    $sr=$_FILES['myfile']['tmp_name'];
    $dest=$uploadfile;

    $res=move_uploaded_file($sr,$dest);
    if ($res!=false){
         echo "0-0-0-$userfile_name";
            if ($geteqid!=""){
             	$SQL = "UPDATE org SET picmap='$userfile_name' WHERE id='$geteqid'";
                $result = mysql_query( $SQL ) or die("Не могу обновить фото!".mysql_error());
                cuttingimg(1,$userfile_name,2);
                cuttingimg(2,$userfile_name,4);
                cuttingimg(3,$userfile_name,8);
            } else {echo "error org";};
     } else {echo "error load";};
}  else {echo "error png";};
?>