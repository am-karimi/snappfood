<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SnappFood Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>
    <style>
        .panel {
            overflow: scroll;
            margin-left: 10px;
            margin-top: 10px;
            width: fit-content;
            background-color: aliceblue;
            opacity: 0.9;
            border: 3px solid #4C3FE4;
            padding: 10px;
            position: absolute;
            z-index: 2;
        }
    </style>


</head>

<body>

<div id="panel" class="panel" style="height: fit-content;">
    <form action="{{route('seller.restaurant.storeLocation')}}" method="post">
        {{--  --}}
        @csrf
        <label>Address</label>
        <input name="address" type="text" placeholder="Address" >
        <br>
        <label>latitude</label>
        <input dir="ltr" name="lat" type="text" placeholder="latitude" required id="center_lat">
        <br>
        <label>longitude</label>
        <input dir="ltr" name="lng" type="text" placeholder="longitude" required id="center_lng">
        <br>
        <input type="hidden" value="{{$restaurant_id}}" name="restaurant_id">
        <button type="submit">submit</button>
        <!--Search_Result-->
    </form>


</div>
<div id="map"
     style="width: 99%; height: 98%; background: #eee; border: 2px solid #aaa;position: absolute;z-index: 1;"></div>
<p id="log">logs</p>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    var centerLat = document.getElementById("center_lat");
    var centerLng = document.getElementById("center_lng");

    //init the map
    var myMap = new L.Map('map', {
        key: 'web.9vM61le4595SKsMFxfA9AXG5zIpYXuW8pVHoMg0I',
        maptype: 'dreamy',
        poi: true,
        traffic: false,
        center: [35.699739, 51.338097],
        zoom: 14
    });
    //adding the marker to map
    var marker = L.marker([35.699739, 51.338097]).addTo(myMap);
    centerLat.value = "35.699739";
    centerLng.value = "51.338097";
    //on map binding
    myMap.on('click', addMarkerOnMap);

    var greenIcon = new L.Icon({
        iconUrl: `icon/marker-icon-2x-green.png`,
        shadowUrl: 'icon/shadow/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var redIcon = new L.Icon({
        iconUrl: 'icon/marker-icon-2x-red.png',
        shadowUrl: 'icon/shadow/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });


    //on map click function
    function addMarkerOnMap(e) {
        marker.setLatLng(e.latlng);
        marker.bindPopup(`lat : ${e.latlng.lat} - lng : ${e.latlng.lng}`).openPopup();
        centerLat.value = e.latlng.lat;
        centerLng.value = e.latlng.lng;
    }

    var searchMarkers = [];

    //sending request to Search API
    function search() {
        // restarting the markers
        for (var j = 0; j < searchMarkers.length; j++) {
            if (searchMarkers[j] != null) {
                myMap.removeLayer(searchMarkers[j]);
                searchMarkers[j] = null;
            }
        }
        marker.setLatLng([centerLat.value, centerLng.value]);
        //getting term value from input tag
        var term = document.getElementById("term").value;
        //making url
        var url = `https://api.neshan.org/v1/search?term=${term}&lat=${centerLat.value}&lng=${centerLng.value}`;
        //add your api key
        var params = {
            headers: {
                'Api-Key': 'web.9vM61le4595SKsMFxfA9AXG5zIpYXuW8pVHoMg0I'
            },

        };
        //sending get request
        axios.get(url, params)
            .then(data => {
                document.getElementById("resualt").innerHTML = "";
                if (data.data.count != 0) {
                    document.getElementById("panel").style = "height: 60%;"
                } else {
                    document.getElementById("panel").style = "height: fit-content;"
                }
                document.getElementById("resultCount").textContent = `تعداد نتایج : ${data.data.count}`
                //set center of map to marker location
                console.log(data.data);
                myMap.flyTo([centerLat.value, centerLng.value], 12);

                //for every search resualt add marker
                var i;
                for (i = 0; i < data.data.count; i++) {
                    var info = data.data.items[i];
                    searchMarkers[i] = L.marker([info.location.y, info.location.x], {
                        icon: greenIcon,
                        title: info.title
                    }).addTo(myMap);
                    makeDiveResualt(data.data.items[i], i);
                }


            }).catch(error => {
            document.getElementById("resualt").innerHTML = "";
            document.getElementById("panel").style = "height: fit-content;"
            document.getElementById("resultCount").textContent = `تعداد نتایج : 0`
            console.log(error.response);
        });
    }

    function makeDiveResualt(data, index) {
        var resultsDiv = document.getElementById("resualt");
        var resultDiv = document.createElement("div");
        resultDiv.onclick = function(e) {
            myMap.flyTo([data.location.y, data.location.x], 16);
            // searchMarkers[index].setIcon(redIcon);
            // setTimeout(function(){
            //     searchMarkers[index].setIcon(greenIcon);
            // },4000);
            for (var i = 0; i < searchMarkers.length; i++) {
                if (i == index) {
                    searchMarkers[i].setIcon(redIcon);
                    continue;
                }
                searchMarkers[i].setIcon(greenIcon);
            }

        }
        resultDiv.dir = "ltr";
        var resultAddress = document.createElement("pre");
        resultAddress.textContent = `title : ${data.title} \n Address : ${data.address} \n type : ${data.type}`;
        resultAddress.style = `border: solid ${generateRandomColor()};`;
        resultsDiv.appendChild(resultDiv);
        resultDiv.appendChild(resultAddress);

    }

    //random color generator :))
    function generateRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>

</body>

</html>
