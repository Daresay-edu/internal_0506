function makeup_finish(str)
{

	arr=str.split("&");
	
	var Url2=document.getElementById(arr[4]);
	Url2.select(); // Ñ¡Ôñ¶ÔÏó
	document.execCommand("Copy"); // Ö´ĞĞä¯ÀÀÆ÷¸´ÖÆÃüÁî

	document.getElementById("classid").value = arr[0];
	document.getElementById("engname").value = arr[1];
	document.getElementById("ab_hour").value = arr[2];
	document.getElementById("toclassid").value = arr[3];
	document.remind.submit();
	return true;

} 
//»ñÈ¡ÏÂ´Î¿Î¿ÎÊ±
function getClassnum(classid) {
			
			// ´´½¨XMLHttpRequest¶ÔÏó  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari ÏÖ´úä¯ÀÀÆ÷  
				xmlhttp=new XMLHttpRequest();  
			}  
			else  
			{// code for IE6, IE5 ÓÃ»§µÍ°æ±¾ie  
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			 // ÉèÖÃÇëÇóÀàĞÍ,ÇëÇóµØÖ·£¬ÒÔ¼°ÊÇ·ñÆôÓÃÒì²½´¦ÀíÇëÇó£¬´ó¶àÊıÉèÖÃ¿ªÆô true  
			xmlhttp.open("GET","database_opt/get_next_class_hour.php?hour="+classid,true);  
			// ½«ÇëÇó·¢ËÍÖÁ·şÎñÆ÷  
			xmlhttp.send();  
			// ´¦ÀíonreadystatechangeÊÂ¼ş ÎÒÃÇ¹æ¶¨µ±·şÎñÆ÷ÏìÓ¦ÒÑ×öºÃ±»´¦ÀíµÄ×¼±¸Ê±ËùÖ´ĞĞµÄÈÎÎñ  
			xmlhttp.onreadystatechange=function()  
			{  
				// 4,200 ²»ÖªµÀ¿ÉÒÔ¿´¿´ÉÏÃæÎÒÌù³öÀ´µÄ½éÉÜ  
				if (xmlhttp.readyState==4 && xmlhttp.status==200)  
				{
					document.getElementById("begin_class").options.length = 0;
					var set_selected=0;					 
					for(var i=1;i<192;i++) {
						var str=i+"-"+(i+1);
						
						if (set_selected==1) {
							document.getElementById("begin_class").add(new Option(str,str,true,true));
							set_selected=0;
						} else {
							document.getElementById("begin_class").add(new Option(str,str));
						}
						 if (xmlhttp.responseText==str) {
							 set_selected=1;
						 }
						 i++;
					}
				}  
			}  
      
			
}
//»ñÈ¡Ä¿Ç°ËùÉÏ¿ÎÊ±
function getClassnum1(classid) {
			
			// ´´½¨XMLHttpRequest¶ÔÏó  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari ÏÖ´úä¯ÀÀÆ÷  
				xmlhttp=new XMLHttpRequest();  
			}  
			else  
			{// code for IE6, IE5 ÓÃ»§µÍ°æ±¾ie  
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			 // ÉèÖÃÇëÇóÀàĞÍ,ÇëÇóµØÖ·£¬ÒÔ¼°ÊÇ·ñÆôÓÃÒì²½´¦ÀíÇëÇó£¬´ó¶àÊıÉèÖÃ¿ªÆô true  
			xmlhttp.open("GET","database_opt/get_next_class_hour.php?hour="+classid,true);  
			// ½«ÇëÇó·¢ËÍÖÁ·şÎñÆ÷  
			xmlhttp.send();  
			// ´¦ÀíonreadystatechangeÊÂ¼ş ÎÒÃÇ¹æ¶¨µ±·şÎñÆ÷ÏìÓ¦ÒÑ×öºÃ±»´¦ÀíµÄ×¼±¸Ê±ËùÖ´ĞĞµÄÈÎÎñ  
			xmlhttp.onreadystatechange=function()  
			{  
				// 4,200 ²»ÖªµÀ¿ÉÒÔ¿´¿´ÉÏÃæÎÒÌù³öÀ´µÄ½éÉÜ  
				if (xmlhttp.readyState==4 && xmlhttp.status==200)  
				{
					document.getElementById("begin_class").options.length = 0;
					//var set_selected=0;					 
					for(var i=1;i<192;i++) {
						var str=i+"-"+(i+1);
						
						if (xmlhttp.responseText==str) {
							document.getElementById("begin_class").add(new Option(str,str,true,true));
							//set_selected=0;
						} else {
							document.getElementById("begin_class").add(new Option(str,str));
						}
						
						 i++;
					}
				}  
			}  
      
			
}
function getClassMem(classid) {
			// ´´½¨XMLHttpRequest¶ÔÏó  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari ÏÖ´úä¯ÀÀÆ÷  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 ÓÃ»§µÍ°æ±¾ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			// ÉèÖÃÇëÇóÀàĞÍ,ÇëÇóµØÖ·£¬ÒÔ¼°ÊÇ·ñÆôÓÃÒì²½´¦ÀíÇëÇó£¬´ó¶àÊıÉèÖÃ¿ªÆô true  
			xmlhttp1.open("GET","database_opt/get_class_members.php?mem="+classid,true);  
			// ½«ÇëÇó·¢ËÍÖÁ·şÎñÆ÷  
			xmlhttp1.send();  
			// ´¦ÀíonreadystatechangeÊÂ¼ş ÎÒÃÇ¹æ¶¨µ±·şÎñÆ÷ÏìÓ¦ÒÑ×öºÃ±»´¦ÀíµÄ×¼±¸Ê±ËùÖ´ĞĞµÄÈÎÎñ  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 ²»ÖªµÀ¿ÉÒÔ¿´¿´ÉÏÃæÎÒÌù³öÀ´µÄ½éÉÜ  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("engname").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("engname").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
function dis_ab_getClassMem(classid) {
			// ´´½¨XMLHttpRequest¶ÔÏó  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari ÏÖ´úä¯ÀÀÆ÷  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 ÓÃ»§µÍ°æ±¾ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			// ÉèÖÃÇëÇóÀàĞÍ,ÇëÇóµØÖ·£¬ÒÔ¼°ÊÇ·ñÆôÓÃÒì²½´¦ÀíÇëÇó£¬´ó¶àÊıÉèÖÃ¿ªÆô true  
			xmlhttp1.open("GET","database_opt/get_class_members.php?mem="+classid,true);  
			// ½«ÇëÇó·¢ËÍÖÁ·şÎñÆ÷  
			xmlhttp1.send();  
			// ´¦ÀíonreadystatechangeÊÂ¼ş ÎÒÃÇ¹æ¶¨µ±·şÎñÆ÷ÏìÓ¦ÒÑ×öºÃ±»´¦ÀíµÄ×¼±¸Ê±ËùÖ´ĞĞµÄÈÎÎñ  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 ²»ÖªµÀ¿ÉÒÔ¿´¿´ÉÏÃæÎÒÌù³öÀ´µÄ½éÉÜ  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("dis_engname").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					//document.getElementById("dis_engname").add(new Option("All","All"));
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("dis_engname").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
function mod_del_ab_getClassMem1(classid) {
			// ´´½¨XMLHttpRequest¶ÔÏó  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari ÏÖ´úä¯ÀÀÆ÷  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 ÓÃ»§µÍ°æ±¾ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			
			// ÉèÖÃÇëÇóÀàĞÍ,ÇëÇóµØÖ·£¬ÒÔ¼°ÊÇ·ñÆôÓÃÒì²½´¦ÀíÇëÇó£¬´ó¶àÊıÉèÖÃ¿ªÆô true  
			xmlhttp1.open("GET","database_opt/get_class_members.php?mem="+classid,true);  
			// ½«ÇëÇó·¢ËÍÖÁ·şÎñÆ÷  
			xmlhttp1.send();  
			// ´¦ÀíonreadystatechangeÊÂ¼ş ÎÒÃÇ¹æ¶¨µ±·şÎñÆ÷ÏìÓ¦ÒÑ×öºÃ±»´¦ÀíµÄ×¼±¸Ê±ËùÖ´ĞĞµÄÈÎÎñ  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 ²»ÖªµÀ¿ÉÒÔ¿´¿´ÉÏÃæÎÒÌù³öÀ´µÄ½éÉÜ  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("mod_del_engname").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					document.getElementById("mod_del_engname").add(new Option("CAT","CAT"));
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("mod_del_engname").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
function getsomeoneAB() {
			// ´´½¨XMLHttpRequest¶ÔÏó  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari ÏÖ´úä¯ÀÀÆ÷  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 ÓÃ»§µÍ°æ±¾ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			var str1=document.getElementById("mod_del_classid").value;
			var str2=document.getElementById("mod_del_engname").value;
			var tmp=str1+";"+str2;
			// ÉèÖÃÇëÇóÀàĞÍ,ÇëÇóµØÖ·£¬ÒÔ¼°ÊÇ·ñÆôÓÃÒì²½´¦ÀíÇëÇó£¬´ó¶àÊıÉèÖÃ¿ªÆô true  
			xmlhttp1.open("GET","database_opt/get_ab_hour_through_classid_engname.php?classid_engname="+tmp,true);  
			// ½«ÇëÇó·¢ËÍÖÁ·şÎñÆ÷  
			xmlhttp1.send();  
			// ´¦ÀíonreadystatechangeÊÂ¼ş ÎÒÃÇ¹æ¶¨µ±·şÎñÆ÷ÏìÓ¦ÒÑ×öºÃ±»´¦ÀíµÄ×¼±¸Ê±ËùÖ´ĞĞµÄÈÎÎñ  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 ²»ÖªµÀ¿ÉÒÔ¿´¿´ÉÏÃæÎÒÌù³öÀ´µÄ½éÉÜ  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("ab_hour").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("ab_hour").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
function getnextClassID(classid) {
	var level = classid.substring(0,1);
	var inclassid = parseInt(classid.substr(1)) + 1;
	inclassid = level + inclassid;
	document.getElementById("inclassid").add(new Option(inclassid,inclassid,true,true));
}
 function addAbsent(classid) {
	 getClassMem(classid);
	 getClassnum1(classid);
	 getnextClassID(classid);
 }
 
function makesure(){
    if (confirm("¿¿¿¿¿¿¿")) {
        return true; 
    }
    return false;
}
