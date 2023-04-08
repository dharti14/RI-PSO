document.addEventListener('DOMContentLoaded', (event) => {

    let pageurl = document.location.href;

    if (pageurl.endsWith('/ri/main/index-b.php') == true || pageurl.endsWith('/removals-index-lp-ri-b-non-dki/') == true) { // banner was loaded
        		
		document.arrive("#CybotCookiebotDialogBodyLevelButtonLevelOptinAllowAll", async function() {

            initiateMixPanel('loaded');

			// Add click handlers to cookie banner buttons to track events in mixpanel
			document.querySelector("#CybotCookiebotDialogBodyButtonDecline").addEventListener("click", event => {
				mixpanel.track('cookieBannerClosed', { 'bannerOutcome': 'cookiesRejected' });
			});
			document.querySelector("#CybotCookiebotDialogBodyLevelButtonLevelOptinAllowAll").addEventListener("click", event => {
				mixpanel.track('cookieBannerClosed', { 'bannerOutcome': 'cookiesFullyAccepted' });
			});
			document.querySelector("#CybotCookiebotDialogBodyLevelButtonLevelOptinAllowallSelection").addEventListener("click", event => { 
				
                //looks up the cookie selection from the UI and translates to an object we can send to mixpanel
                let cookiePrefElements = document.querySelectorAll("#CybotCookiebotDialogDetailBody .CybotCookiebotDialogBodyLevelButton.CybotCookiebotDialogBodyLevelConsentCheckbox");
                let cookieSelection = {};

                cookiePrefElements.forEach(element => {
                    let propertyName = element.dataset.target.replace('CybotCookiebotDialogBodyLevelButton','').toLowerCase();                    
                    if (element.checked == true) { cookieSelection[propertyName] = 'accepted'; }
                    else { cookieSelection[propertyName] = 'rejected'; }
                });
                
                let cookieConfig = { bannerOutcome: 'cookiesPartiallyAccepted', cookieConfiguration: cookieSelection };
                mixpanel.track('cookieBannerClosed', cookieConfig);

			});
		});

    } else if (pageurl.endsWith('/ri/main/index-3.php')) { // banner was NOT loaded
        initiateMixPanel('suppressed');
    } else if (pageurl.endsWith('/2/thanks/')) {
        initiateMixPanel('thankyou');
    }

});

function initiateMixPanel(action) {
    let userUuid = getUUID();

    (function(f,b){if(!b.__SV){var e,g,i,h;window.mixpanel=b;b._i=[];b.init=function(e,f,c){function g(a,d){var b=d.split(".");2==b.length&&(a=a[b[0]],d=b[1]);a[d]=function(){a.push([d].concat(Array.prototype.slice.call(arguments,0)))}}var a=b;"undefined"!==typeof c?a=b[c]=[]:c="mixpanel";a.people=a.people||[];a.toString=function(a){var d="mixpanel";"mixpanel"!==c&&(d+="."+c);a||(d+=" (stub)");return d};a.people.toString=function(){return a.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking start_batch_senders people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove".split(" ");
    for(h=0;h<i.length;h++)g(a,i[h]);var j="set set_once union unset remove delete".split(" ");a.get_group=function(){function b(c){d[c]=function(){call2_args=arguments;call2=[c].concat(Array.prototype.slice.call(call2_args,0));a.push([e,call2])}}for(var d={},e=["get_group"].concat(Array.prototype.slice.call(arguments,0)),c=0;c<j.length;c++)b(j[c]);return d};b._i.push([e,f,c])};b.__SV=1.2;e=f.createElement("script");e.type="text/javascript";e.async=!0;e.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?
    MIXPANEL_CUSTOM_LIB_URL:"file:"===f.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";g=f.getElementsByTagName("script")[0];g.parentNode.insertBefore(e,g)}})(document,window.mixpanel||[]);
    
    // Enabling the debug mode flag is useful during implementation,
    // but it's recommended you remove it for production
    mixpanel.init('e9544c256a5bf67f22210f08604205d9');
    mixpanel.identify(userUuid);

    switch (action) {
        case 'loaded':
            mixpanel.people.set({'bannerLoaded': 'true'});
            break;
        case 'suppressed':
            mixpanel.people.set({'bannerLoaded': 'false'});
            break
        case 'thankyou':
            mixpanel.track('leadSubmitted');
    }
}

function getUUID() {

    if (window.localStorage.getItem('cookieBannerUserUUID') === null) window.localStorage.setItem('cookieBannerUserUUID', generateUUID());
    return window.localStorage.getItem('cookieBannerUserUUID');

}

function generateUUID () {
    let
        d = new Date().getTime(),
        d2 = (performance && performance.now && (performance.now() * 1000)) || 0;
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, c => {
        let r = Math.random() * 16;
        if (d > 0) {
            r = (d + r) % 16 | 0;
            d = Math.floor(d / 16);
        } else {
            r = (d2 + r) % 16 | 0;
            d2 = Math.floor(d2 / 16);
        }
        return (c == 'x' ? r : (r & 0x7 | 0x8)).toString(16);
    });
};