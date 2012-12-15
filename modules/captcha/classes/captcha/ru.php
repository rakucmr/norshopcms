<?php defined('SYSPATH') OR die('No direct access.');
/**
 * Alpha captcha class.
 *
 * @package		Captcha
 * @subpackage	Captcha_Alpha
 * @author		Michael Lavers
 * @author		Kohana Team
 * @copyright	(c) 2008-2010 Kohana Team
 * @license		http://kohanaphp.com/license.html
 */
class Captcha_Ru extends Captcha 
{
	/**
	 * Generates a new Captcha challenge.
	 *
	 * @return string The challenge answer
	 */
    
	public function generate_challenge()
	{
		// Complexity setting is used as character count
		//$text = text::random('distinct', max(1, Captcha::$config['complexity']));
                // generating random keystring
                $allowed_symbols = Captcha::$config['allowedsymbols'];
                $length = Captcha::$config['complexity'];
                while(true){
                        $keystring='';
                        for($i=0;$i<$length;$i++){
                                $keystring.=$allowed_symbols{mt_rand(0,strlen($allowed_symbols)-1)};
                        }
                        if(!preg_match('/cp|cb|ck|c6|c9|rn|rm|mm|co|do|cl|db|qp|qb|dp|ww/', $keystring)) break;
                }
		$text = $keystring;
		// Complexity setting is used as character count
		return $text;
	}

	/**
	 * Outputs the Captcha image.
	 *
	 * @param boolean $html Html output
	 * @return mixed
	 */
	public function render($html = TRUE)
	{
		// Creates $this->image
		$this->image_create(Captcha::$config['background']);

		// Add a random gradient
		//require(dirname(__FILE__).'/kcaptcha_config.php');
		//require(MODPATH.'captcha/kcaptcha_config.php');
		$fonts=array();
		//$fontsdir_absolute = MODPATH.'captcha/'.$fontsdir;
		$alphabet = Captcha::$config['alphabet'];
		$width = Captcha::$config['width'];
		$height = Captcha::$config['height'];
                $length = Captcha::$config['complexity'];
		$fontsdir_absolute = Captcha::$config['kchapchafontpath'];
                $fluctuation_amplitude = Captcha::$config['fluctuationamplitude'];
                $white_noise_density = Captcha::$config['whitenoisedensity'];
                $black_noise_density = Captcha::$config['blacknoisedensity'];
                $no_spaces = Captcha::$config['nospaces'];
                $show_credits = Captcha::$config['showcredits'];
                $foreground_color = Captcha::$config['foregroundcolor'];
                $background_color = Captcha::$config['backgroundcolor'];
                $jpeg_quality = Captcha::$config['jpegquality'];
		if ($handle = opendir($fontsdir_absolute)) {
			while (false !== ($file = readdir($handle))) {
				if (preg_match('/\.png$/i', $file)) {
					$fonts[]=$fontsdir_absolute.'/'.$file;
				}
			}
		    closedir($handle);
		}	
	
		$alphabet_length=strlen($alphabet);
		
		do{
			
		
			$font_file=$fonts[mt_rand(0, count($fonts)-1)];
			$font=imagecreatefrompng($font_file);
			imagealphablending($font, true);

			$fontfile_width=imagesx($font);
			$fontfile_height=imagesy($font)-1;
			
			$font_metrics=array();
			$symbol=0;
			$reading_symbol=false;

			// loading font
			for($i=0;$i<$fontfile_width && $symbol<$alphabet_length;$i++){
				$transparent = (imagecolorat($font, $i, 0) >> 24) == 127;

				if(!$reading_symbol && !$transparent){
					$font_metrics[$alphabet{$symbol}]=array('start'=>$i);
					$reading_symbol=true;
					continue;
				}

				if($reading_symbol && $transparent){
					$font_metrics[$alphabet{$symbol}]['end']=$i;
					$reading_symbol=false;
					$symbol++;
					continue;
				}
			}

			$this->image1=imagecreatetruecolor($width, $height);
			imagealphablending($this->image1, true);
			$white=imagecolorallocate($this->image1, 255, 255, 255);
			$black=imagecolorallocate($this->image1, 0, 0, 0);

			imagefilledrectangle($this->image1, 0, 0, $width-1, $height-1, $white);

			// draw text
			$x=1;
			$odd=mt_rand(0,1);
			if($odd==0) $odd=-1;
			for($i=0;$i<$length;$i++){
				//$m=$font_metrics[$this->keystring{$i}];
				$m=$font_metrics[$this->response{$i}];

				$y=(($i%2)*$fluctuation_amplitude - $fluctuation_amplitude/2)*$odd
					+ mt_rand(-round($fluctuation_amplitude/3), round($fluctuation_amplitude/3))
					+ ($height-$fontfile_height)/2;

				if($no_spaces){
					$shift=0;
					if($i>0){
						$shift=10000;
						for($sy=3;$sy<$fontfile_height-10;$sy+=1){
							for($sx=$m['start']-1;$sx<$m['end'];$sx+=1){
				        		$rgb=imagecolorat($font, $sx, $sy);
				        		$opacity=$rgb>>24;
								if($opacity<127){
									$left=$sx-$m['start']+$x;
									$py=$sy+$y;
									if($py>$height) break;
									for($px=min($left,$width-1);$px>$left-200 && $px>=0;$px-=1){
						        		$color=imagecolorat($this->image1, $px, $py) & 0xff;
										if($color+$opacity<170){ // 170 - threshold
											if($shift>$left-$px){
												$shift=$left-$px;
											}
											break;
										}
									}
									break;
								}
							}
						}
						if($shift==10000){
							$shift=mt_rand(4,6);
						}

					}
				}else{
					$shift=1;
				}
				imagecopy($this->image1, $font, $x-$shift, $y, $m['start'], 1, $m['end']-$m['start'], $fontfile_height);
				$x+=$m['end']-$m['start']-$shift;
			}
		}while($x>=$width-10); // while not fit in canvas

		//noise
		$white=imagecolorallocate($font, 255, 255, 255);
		$black=imagecolorallocate($font, 0, 0, 0);
		for($i=0;$i<(($height-30)*$x)*$white_noise_density;$i++){
			imagesetpixel($this->image1, mt_rand(0, $x-1), mt_rand(10, $height-15), $white);
		}
		for($i=0;$i<(($height-30)*$x)*$black_noise_density;$i++){
			imagesetpixel($this->image1, mt_rand(0, $x-1), mt_rand(10, $height-15), $black);
		}

		
		$center=$x/2;

		// credits. To remove, see configuration file
		$this->image=imagecreatetruecolor($width, $height+($show_credits?12:0));
		$foreground=imagecolorallocate($this->image, $foreground_color[0], $foreground_color[1], $foreground_color[2]);
		$background=imagecolorallocate($this->image, $background_color[0], $background_color[1], $background_color[2]);
		imagefilledrectangle($this->image, 0, 0, $width-1, $height-1, $background);		
		imagefilledrectangle($this->image, 0, $height, $width-1, $height+12, $foreground);
		$credits=empty($credits)?$_SERVER['HTTP_HOST']:$credits;
		imagestring($this->image, 2, $width/2-imagefontwidth(2)*strlen($credits)/2, $height-2, $credits, $background);

		// periods
		$rand1=mt_rand(750000,1200000)/10000000;
		$rand2=mt_rand(750000,1200000)/10000000;
		$rand3=mt_rand(750000,1200000)/10000000;
		$rand4=mt_rand(750000,1200000)/10000000;
		// phases
		$rand5=mt_rand(0,31415926)/10000000;
		$rand6=mt_rand(0,31415926)/10000000;
		$rand7=mt_rand(0,31415926)/10000000;
		$rand8=mt_rand(0,31415926)/10000000;
		// amplitudes
		$rand9=mt_rand(330,420)/110;
		$rand10=mt_rand(330,450)/100;

		//wave distortion

		for($x=0;$x<$width;$x++){
			for($y=0;$y<$height;$y++){
				$sx=$x+(sin($x*$rand1+$rand5)+sin($y*$rand3+$rand6))*$rand9-$width/2+$center+1;
				$sy=$y+(sin($x*$rand2+$rand7)+sin($y*$rand4+$rand8))*$rand10;

				if($sx<0 || $sy<0 || $sx>=$width-1 || $sy>=$height-1){
					continue;
				}else{
					$color=imagecolorat($this->image1, $sx, $sy) & 0xFF;
					$color_x=imagecolorat($this->image1, $sx+1, $sy) & 0xFF;
					$color_y=imagecolorat($this->image1, $sx, $sy+1) & 0xFF;
					$color_xy=imagecolorat($this->image1, $sx+1, $sy+1) & 0xFF;
				}

				if($color==255 && $color_x==255 && $color_y==255 && $color_xy==255){
					continue;
				}else if($color==0 && $color_x==0 && $color_y==0 && $color_xy==0){
					$newred=$foreground_color[0];
					$newgreen=$foreground_color[1];
					$newblue=$foreground_color[2];
				}else{
					$frsx=$sx-floor($sx);
					$frsy=$sy-floor($sy);
					$frsx1=1-$frsx;
					$frsy1=1-$frsy;

					$newcolor=(
						$color*$frsx1*$frsy1+
						$color_x*$frsx*$frsy1+
						$color_y*$frsx1*$frsy+
						$color_xy*$frsx*$frsy);

					if($newcolor>255) $newcolor=255;
					$newcolor=$newcolor/255;
					$newcolor0=1-$newcolor;

					$newred=$newcolor0*$foreground_color[0]+$newcolor*$background_color[0];
					$newgreen=$newcolor0*$foreground_color[1]+$newcolor*$background_color[1];
					$newblue=$newcolor0*$foreground_color[2]+$newcolor*$background_color[2];
				}

				imagesetpixel($this->image, $x, $y, imagecolorallocate($this->image, $newred, $newgreen, $newblue));
			}
		}

		// Output
		return $this->image_render($html);
	}

} // End Captcha Alpha Driver Class