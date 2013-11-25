/**
 * 收藏夹和设为首页等函数
 *  
 * @author 风格独特
 */

// 收藏夹
function BookMarkit(title, url, desc)
{
     if ((typeof window.sidebar == 'object') && (typeof window.sidebar.addPanel == 'function')) {
         window.sidebar.addPanel(title, url, desc);
         return false;
     }
     else {
         window.external.AddFavorite(url, title);
         return false;
     }
}

// 设为首页
function SetHome(obj, vrl)
{
	try {
		obj.style.behavior='url(#default#homepage)';
		obj.setHomePage(vrl);
		return false;
	} 
	catch(e) { 
		if(window.netscape) { 
			try { 
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
				return false;
			} 
			catch (e) { 
				alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。"); 
				return false;
			} 
			var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch); 
			prefs.setCharPref('browser.startup.homepage', vrl); 
			return false;
		} 
	} 
}
