<script>
var wsServer = 'ws://112.74.182.162:9501';
var websocket = new WebSocket(wsServer); 
websocket.onopen = function (evt) { 
	console.log("Connected to WebSocket server.");
}; 

websocket.onclose = function (evt) { 
	console.log("Disconnected"); 
}; 

websocket.onmessage = function (evt) { 
	console.log('Retrieved data from server: ' + evt.data); 
}; 

websocket.onerror = function (evt, e) {
	console.log('Error occured: ' + evt.data);
};
</script>
