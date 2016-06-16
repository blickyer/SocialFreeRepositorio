<?php
/**
 * @name bbcode.inc.php
 * @author JNeutron
 * @copyright 2011
 * @description BBCode Parser para PHPost
 */
class BBCode {
    /**
     * @name $restriction
     * @description Que BBCodes podrán ser convertidos
     */
    public $restriction = Array("url", "code", "quote", "quotePHPost", "font", "size", "color", "img", "b", "i", "u", "align", "spoiler", "swf", "goear", "hr", "li");
    /**
     * CONSTRUCTOR
     */
    public function BBCode(){}
	/**
	* Public instance.
	*/
    public static function &getInstance(){
		static $bbcode;
		
		if( is_null($bbcode) ){
			$bbcode = new BBCode();
    	}
		return $bbcode;
	}
    /**
     * @name eregEngine($st)
     * @access private
     * @param string
     * @return string
     * @description Busca y reemplaza los BBCodes simples
     */
	private function ereg_engine($st, $a_name, $pre, $suf) {
		while( preg_match( "/(?i)\[{$a_name}\]([^\a]+?)\[\/{$a_name}\]/i",  $st ) ) {
			$st = preg_replace("/(?i)\[{$a_name}\]([^\a]+?)\[\/{$a_name}\]/i", $pre."\\1".$suf, $st);
		}
		return $st;
	}
    /**
     * @name parseString($st)
     * @param string
     * @return string
     * @access public
     * @description Convierte el texto BBCODE a HTML
     */
    public function parseString($st){
        // CONVERTIMOS ALGUNOS CARACTERES
        $st = str_replace("&#039;","'",$st);
        // CODIGO
        $this->codeParse($st);
        // SIMPLES BBCODE
        $this->simpleParse($st);
        // COMPLEJO BBCODE
        $this->complexParse($st);
        // SUSTITUIMOS
        $st = str_replace('\n','<br />',$st);
        // RETORNAMOS
        return nl2br($st);
    }
    /**
    * @name codeParse(&$st)
    * @access private
    * @description Colorea el código PHP
    */
    private function codeParse(&$st){
        $mod = "code";
        // OBTENEMOS TODOS LOS BBCODE [code](.*)[/code]
        preg_match_all("/(?i)\[{$mod}\]([^\a]+?)\[\/{$mod}\]/i", $st, $php);
        $countPhp = count( $php[1] );
        for( $a = 0; $a < $countPhp; $a++ ) {
            $elaborate = trim($php[1][$a]);
            // COLOREAR
            $elaborate = highlight_string( html_entity_decode( $elaborate ), true );
            // SALTOS DE LINEA
            $elaborate = preg_replace("/(\\n|\\r)/", "", $elaborate );
            // REEMPLAZAR
            $st = str_replace( "[{$mod}]{$php[1][$a]}[/{$mod}]", $elaborate, $st);
        }
    }
    /**
    * @name simpleParse(&st)
    * @access private
    * @description Reemplaza los BBCodes simples
    */
    private function simpleParse(&$st){
        $bbcodes = array(
        	array("name" => "i","pre" => "<i>","suf" => "</i>"),
        	array("name" => "u","pre" => "<span style=\"text-decoration: underline;\">","suf" => "</span>"),
        	array("name" => "b","pre" => "<b>","suf" => "</b>"),
        	array("name" => "quote","pre" => "<blockquote><div class=\"cita\"><strong>Cita:</strong></div><div class=\"citacuerpo\"><p>","suf" => "</p></div></blockquote>"),
            array("name" => "spoiler","pre" => "<div class=\"spoiler\"><div class=\"title\"><a href=\"#\" onclick=\"spoiler($(this)); return false;\">Spoiler:</a></div><div class=\"body\">","suf" => "</div></div>")
        );
        // CAMBIAR
        for($a=0; $a<count($bbcodes); $a++) {
        	$a_name = $bbcodes[$a]["name"];
        	if( in_Array($a_name, $this->restriction) ) {
        		$st = $this->ereg_engine($st, $a_name, $bbcodes[$a]["pre"], $bbcodes[$a]["suf"]);
        	}
        }
    }
    /**
    * @name complexParse(&$st)
    * @access private
    * @description Reemplaza los BBCodes complejos
    */
    private function complexParse(&$st){
        // ELEMNTOS BBCode
        $elements = array(
        	array("url", "/(?i)(\[url\])(http|https|ftp|irc|ed2k|gopher|telnet)(\:\/\/)([^\<\>[:space:]]+?)(\[\/url\])/i", "<a href=\"\\2\\3\\4\" target=\"_blank\">\\2\\3\\4</a>"),
        	array("url", "/(?i)\[url\=(http|https|ftp|irc|ed2k|gopher|telnet|gopher|telnet)(\:\/\/)([^\<\>[:space:]]+?)\](.+?)(\[\/url\])/i", "<a href=\"\\1\\2\\3\" target=\"_blank\">\\4</a>"),
            array("quotePHPost", "/(?i)\[quote\=([^\n\r\t\<\>]+?)\|([0-9]+?)\]([^\a]+?)\[\/quote\]/i", "<blockquote><div class=\"cita\"><strong>\\1</strong> dijo:</div><div class=\"citacuerpo\"><p>\\3</p></div></blockquote>"),
            array("quote", "/(?i)\[quote\=([^\n\r\t\<\>]+?)\]([^\a]+?)\[\/quote\]/i", "<blockquote><div class=\"cita\"><strong>\\1</strong> dijo:</div><div class=\"citacuerpo\"><p>\\2</p></div></blockquote>"),
            array("align", "/(?i)\[align\=([a-z]+)\]([^\a]+?)\[\/align\]/i", "<div align=\"\\1\">\\2</div>"),
        	array("size", "/(?i)\[size\=([0-9]{1,2})\]([^\a]+?)\[\/size\]/i", "<span style=\"font-size:\\1pt;line-height:\\1pt;\">\\2</span>"),
        	array("color", "/(?i)\[color\=([\#]?[0-9a-f]{3}|[\#]?[0-9a-f]{6}|[a-z]{3,})\]([^\a]+?)\[\/color\]/i", "<span style=\"color: \\1;\">\\2</span>"),
        	array("font", "/(?i)\[font\=([^\a]+?)\]([^\a]+?)\[\/font\]/i", "<font face=\"\\1\">\\2</font>"),
            array("img", "/(?i)(\[img\])(http|https|ftp|irc|ed2k|gopher|telnet)?(\:\/\/)?([^\<\>[:space:]]+?)(\[\/img\])/i", "<img src=\"\\2\\3\\4\" />"),
            array("img", "/(?i)\[img\=(http|https|ftp|irc|ed2k|gopher|telnet)?(\:\/\/)?([^\<\>[:space:]]+)\]/i", "<img src=\"\\1\\2\\3\" />"),
            array("swf", "/(?i)\[swf\=(http|https)?(\:\/\/www.youtube.com\/v\/+)?(.+?)\]/i", "<div style=\"position: relative;width: 100%;padding-top: 56.25%\"><iframe width=\"100%\" height=\"100%\" src=\"//www.youtube.com/embed/\\3\" frameborder=\"0\" allowFullScreen style=\"position: absolute;left: 0;top: 0;\"></iframe></div><br/>"),
            array("goear", "/(?i)\[goear\=(.+?)\]/i", "<embed width=\"360\" height=\"130\" wmode=\"transparent\" autoplay=\"false\" allownetworking=\"internal\" allowfullscreen=\"true\" type=\"application/x-shockwave-flash\" quality=\"high\" src=\"http://www.goear.com/files/external.swf?file=\\1\"><br/>"),
            array("hr", "/(?i)\[hr\]/i","<hr/>"),
            array("li", "/(?i)\[\*\]/i","&bull; ")
        );
        // TAMAÑO
        $size = count( $elements );
        // REEMPLAZAR
		for( $elm = 0; $elm < $size; $elm++ ) {
			$element = $elements[$elm][0];
			if( in_array($element, $this->restriction ) ) {
				while( preg_match($elements[$elm][1], $st ) ) {
					$st = preg_replace( $elements[$elm][1], $elements[$elm][2], $st );
				}
			}
		}
        //
    }
    /**
     * @name parseSmiles($st, $path)
     * @access public
     * @description Convierte los Smiles
     */
	public function parseSmiles($st, $path = ''){
		// SMILEYS
		$bbcode = array();
		$html = array();
        //
        $pre = '<img src="'.$path;
        $end = '" align="absmiddle"/>';
		// SMILES DEFAULT
        $bbcode[] =":)"; $html[] = $pre."001.png".$end;
        $bbcode[] =":D"; $html[] = $pre."002.png".$end;
        $bbcode[] =";)"; $html[] = $pre."003.gif".$end;
        $bbcode[] =":O"; $html[] = $pre."004.png".$end;
        $bbcode[] ="(H)"; $html[] = $pre."006.png".$end;
        $bbcode[] =":P"; $html[] = $pre."104.png".$end;
        $bbcode[] ="8o|"; $html[] = $pre."049.png".$end;
        $bbcode[] =":S"; $html[] = $pre."009.png".$end;
        $bbcode[] =":$"; $html[] = $pre."008.png".$end;
        $bbcode[] =":("; $html[] = $pre."010.png".$end;
        $bbcode[] =":'("; $html[] = $pre."011.gif".$end;
        $bbcode[] =":|"; $html[] = $pre."012.png".$end;
        $bbcode[] ="(6)"; $html[] = $pre."013.png".$end;
        $bbcode[] ="8-|"; $html[] = $pre."050.png".$end;
        $bbcode[] =":-/"; $html[] = $pre."083.png".$end;
        $bbcode[] ="^o)"; $html[] = $pre."051.png".$end;
        // EXTRAS SMILES
        $bbcode[] = "(A)"; $html[] = $pre."014.png".$end;
        $bbcode[] = ":["; $html[] = $pre."043.png".$end;
        $bbcode[] = ":-#"; $html[] = $pre."048.png".$end;
        $bbcode[] = ":-*"; $html[] = $pre."052.png".$end;
        $bbcode[] = "+o("; $html[] = $pre."053.png".$end;
        $bbcode[] = "(brb)"; $html[] = $pre."066.gif".$end;
        $bbcode[] = ":^)"; $html[] = $pre."072.gif".$end;
        $bbcode[] = "*-)"; $html[] = $pre."073.gif".$end;
        $bbcode[] = "<o)"; $html[] = $pre."075.gif".$end;
        $bbcode[] = "8-)"; $html[] = $pre."076.gif".$end;
        $bbcode[] = "|-)"; $html[] = $pre."078.gif".$end;
        $bbcode[] =";-/"; $html[] = $pre."082.png".$end;
        $bbcode[] ="(jk)"; $html[] = $pre."084.png".$end;
        $bbcode[] = "(j)"; $html[] = $pre."086.png".$end;
        $bbcode[] = "(V)"; $html[] = $pre."087.png".$end;
        $bbcode[] = "(lol)"; $html[] = $pre."089.gif".$end;
        $bbcode[] = "(xD)"; $html[] = $pre."090.png".$end;
        $bbcode[] = ":8)"; $html[] = $pre."088.png".$end;
        $bbcode[] = "(ff)"; $html[] = $pre."091.gif".$end;
        $bbcode[] = "(fm)"; $html[] = $pre."092.gif".$end;
        $bbcode[] = ":'|"; $html[] = $pre."093.gif".$end;
        $bbcode[] = ":]"; $html[] = $pre."094.gif".$end;
        $bbcode[] = ":}"; $html[] = $pre."095.png".$end;
        $bbcode[] = "(BOO)"; $html[] = $pre."096.png".$end;
        $bbcode[] = "*|"; $html[] = $pre."097.gif".$end;
        $bbcode[] = "*\\"; $html[] = $pre."098.png".$end;
        $bbcode[] = "(wm)"; $html[] = $pre."100.png".$end;
        $bbcode[] = "(xo)"; $html[] = $pre."101.gif".$end;
        // OBJECTOS
        $bbcode[] = "(l)"; $html[] = $pre."015.png".$end;
        $bbcode[] = "(u)"; $html[] = $pre."016.png".$end;
        $bbcode[] = "(@)"; $html[] = $pre."018.png".$end;
        $bbcode[] = "(&)"; $html[] = $pre."019.png".$end;
        $bbcode[] = "(S)"; $html[] = $pre."020.png".$end;
        $bbcode[] = "(*)"; $html[] = $pre."021.png".$end;
        $bbcode[] = "(~)"; $html[] = $pre."022.png".$end;
        $bbcode[] = "(8)"; $html[] = $pre."023.png".$end;
        $bbcode[] = "(E)"; $html[] = $pre."024.png".$end;
        $bbcode[] = "(F)"; $html[] = $pre."025.png".$end;
        $bbcode[] = "(W)"; $html[] = $pre."026.png".$end;
        $bbcode[] = "(O)"; $html[] = $pre."027.gif".$end;
        $bbcode[] = "(K)"; $html[] = $pre."028.png".$end;
        $bbcode[] = "(G)"; $html[] = $pre."029.png".$end;
        $bbcode[] = "(^)"; $html[] = $pre."030.png".$end;
        $bbcode[] = "(P)"; $html[] = $pre."031.png".$end;
        $bbcode[] = "(I)"; $html[] = $pre."032.png".$end;
        $bbcode[] = "(C)"; $html[] = $pre."033.png".$end;
        $bbcode[] = "(T)"; $html[] = $pre."034.png".$end;
        $bbcode[] = "({)"; $html[] = $pre."035.png".$end;
        $bbcode[] = "(})"; $html[] = $pre."036.png".$end;
        $bbcode[] = "(B)"; $html[] = $pre."037.png".$end;
        $bbcode[] = "(D)"; $html[] = $pre."038.png".$end;
        $bbcode[] = "(Z)"; $html[] = $pre."039.png".$end;
        $bbcode[] = "(X)"; $html[] = $pre."040.png".$end;
        $bbcode[] = "(Y)"; $html[] = $pre."041.png".$end;
        $bbcode[] = "(N)"; $html[] = $pre."042.png".$end;
        $bbcode[] = "(nnh)"; $html[] = $pre."044.png".$end;
        $bbcode[] = "(#)"; $html[] = $pre."046.png".$end;
        $bbcode[] = "(R)"; $html[] = $pre."047.png".$end;
        $bbcode[] = "(sn)"; $html[] = $pre."054.png".$end;
        $bbcode[] = "(tu)"; $html[] = $pre."055.png".$end;
        $bbcode[] = "(pl)"; $html[] = $pre."056.png".$end;
        $bbcode[] = "(||)"; $html[] = $pre."057.png".$end;
        $bbcode[] = "(pi)"; $html[] = $pre."058.png".$end;
        $bbcode[] = "(so)"; $html[] = $pre."059.png".$end;
        $bbcode[] = "(au)"; $html[] = $pre."060.png".$end;
        $bbcode[] = "(ap)"; $html[] = $pre."061.png".$end;
        $bbcode[] = "(um)"; $html[] = $pre."062.png".$end;
        $bbcode[] = "(ip)"; $html[] = $pre."063.png".$end;
        $bbcode[] = "(co)"; $html[] = $pre."064.png".$end;
        $bbcode[] = "(mp)"; $html[] = $pre."065.png".$end;
        $bbcode[] = "(st)"; $html[] = $pre."067.png".$end;
        $bbcode[] = "(pu)"; $html[] = $pre."102.png".$end;
        $bbcode[] = "(yn)"; $html[] = $pre."068.png".$end;
        $bbcode[] = "(h5)"; $html[] = $pre."069.gif".$end;
        $bbcode[] = "(mo)"; $html[] = $pre."070.png".$end;
        $bbcode[] = "(bah)"; $html[] = $pre."071.png".$end;
        $bbcode[] = "(li)"; $html[] = $pre."074.gif".$end;
        $bbcode[] = "(wo)"; $html[] = $pre."077.png".$end;
        $bbcode[] = "'.'"; $html[] = $pre."080.png".$end;
        $bbcode[] = "(bus)"; $html[] = $pre."045.png".$end;
        $bbcode[] = "*p*"; $html[] = $pre."079.png".$end;
        $bbcode[] ="*s*"; $html[] = $pre."085.png".$end;
        $bbcode[] = "(M)"; $html[] = $pre."017.png".$end;
        $bbcode[] = "(xx)"; $html[] = $pre."103.png".$end;

		// REEMPLAZAMOS SMILEYS
		return str_replace($bbcode, $html, $st);
	}

}
?>