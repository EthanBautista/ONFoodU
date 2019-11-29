var map;

blockGoogleVerify();

function blockGoogleVerify(){

    (() => {
        "use strict";


        const hackSetter = (value) => () => {
            window.name = value;
            history.go(0)
        };

        hackSetter('hacking');

        // Store old reference
        const appendChild = Element.prototype.appendChild;

        // All services to catch
        const urlCatchers = [
            "/AuthenticationService.Authenticate?",
            "/QuotaService.RecordEvent?"
        ];

        // Google Map is using JSONP.
        // So we only need to detect the services removing access and disabling them by not
        // inserting them inside the DOM
        Element.prototype.appendChild = function (element) {
            const isGMapScript = element.tagName === 'SCRIPT' && /maps\.googleapis\.com/i.test(element.src);
            const isGMapAccessScript = isGMapScript && urlCatchers.some(url => element.src.includes(url));

            if (!isGMapAccessScript) {
                return appendChild.call(this, element);
            }

            // Extract the callback to call it with success data
            // (actually this part is not needed at all but maybe in the future ?)
            //const callback = element.src.split(/.*callback=([^\&]+)/, 2).pop();
            //const [a, b] = callback.split('.');
            //window[a][b]([1, null, 0, null, null, [1]]);

            // Returns the element to be compliant with the appendChild API
            return element;
        };
    })();
}


function initMap() {
    var UA = {lat: 43.9446799, lng: -78.8964657};
    var UBCaf = {lat: 43.9450468, lng: -78.89604};
    var DCCaf = {lat: 43.943483, lng: -78.8973499};
    var Library = {lat: 43.945663, lng: -78.8974201};
    var StudentCenter = {lat: 43.944217, lng: -78.8945221};

    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 43.9448671, lng: -78.8973705},
        zoom: 17
    });

    new google.maps.Marker({position: UA, label: "UA", map: map});
    new google.maps.Marker({position: UBCaf,label: "UB Caf", map: map});
    new google.maps.Marker({position: DCCaf,label: "DC Caf", map: map});
    new google.maps.Marker({position: Library,label: "Library", map: map});
    new google.maps.Marker({position: StudentCenter,label: "StudentCenter", map: map});
}