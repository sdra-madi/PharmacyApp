var locateMe={
    geo:null,
    LocationLink:document.querySelector('a.locate'),
    LocationMap:document.querySelector('div.map'),
    locationLongitude:null,
    locationLatitude:null,
    locationLongInput:document.querySelector('input[name=longitude]'),
    locationLatsInput:document.querySelector('input[name=latitude]'),
    init:function()
    {
if( fales === locateMe.isGeolocatioSupported()){
    locateMe.LocationMap.innerHTML='<p>sorry</p>'
    return;
}
locateMe.geo=Navigator.geolocation;
locateMe.LocationLink.addEventListener('click',locateMe.getCurrentPosition,false);
    },
    isGeolocatioSupported:function()
    {
        return('geolocation' in navigator) ? true :false;
    },
    getCurrentPosition:function(e)
    {
        e.preventDefault();
        locateMe.geo.getCurrentPosition(locateMe.onSuccess,locateMe.onFailure);
        locateMe.LocationMap.innerHTML='Detecting your location';

    },

    onSuccess:function(position)
    {
        locateMe.LocationMap.innerHTML='';
 if(locateMe.setCoordinatesData(position.coords)) 
 {
locateMe.drawMap();
 }
 },

    onFailure:function(error)
    {
console.log(error);
    },

    setCoordinatesData:function(coords)
    {
if(typeof coords !=='object')return false;
locateMe.locationLatitude=locateMe.locationLatsInput.value=coords.Latitude;
locateMe.locationLongitude=locateMe.locationLongInput.value= coords.longitude;
return true;
    },
    drawMap:function()
    { 
        var img =new Image();
        img.src="http://maps.googleapis.com/maps/api/staticmap?" +
         "center=" + locateMe.locationLatitude + "," + locateMe.locationLongitude+ "&zoom=16&size=300×300&scale=1" +
          "&markers=color:blue%7Clabel:S%7C" + locateMe.locationLatitude  + "," + locateMe.locationLongitude + "&sensor=fales";  
       locateMe.LocationMap.appendChild(img);
       
    }


}
locateMe.init();
