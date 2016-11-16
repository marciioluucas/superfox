<!DOCTYPE html>
<html>
<body>
<p id="demo">Clique no botão para receber as coordenadas:</p>
<button onclick="getLocation()">Clique Aqui</button>
<script>
    var x=document.getElementById("demo");
    function getLocation()
    {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
        else{x.innerHTML="Seu browser não suporta Geolocalização.";}
    }
    function showPosition(position)
    {
        x.innerHTML="Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
    function showError(error)
    {
        switch(error.code)
        {
            case error.PERMISSION_DENIED:
                x.innerHTML="Usuário rejeitou a solicitação de Geolocalização.";
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML="Localização indisponível.";
                break;
            case error.TIMEOUT:
                x.innerHTML="A requisição expirou.";
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML="Algum erro desconhecido aconteceu.";
                break;
        }
    }
</script>
</body>
</html>
