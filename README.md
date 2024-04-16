<h1>Mentorship Project API For Flutter</h1> 
<h2>Overview</h2> 

<p>
    This project is a travel platform of a. At the beginning, it was made for make travels and tours
</p>
<h2>Notes</h2>
<ul>
    <li>Auth with <span styale="color😠">sanctum</span></li>
</ul>

<h2>Routs</h2>
| HTTP Method | EndPoint | Description |
|---|---|---|
| GET |  api/v1/travels | Get All Travels |
| GET | api/v1//travels/{travel:slug}/tours | Get Spacific Travel |
| POST | api/v1/admin/tavels | only admin can Store a new travel |
| PUT |  api/v1/admin/travels/{travel} | only admin can Update travel data  |
| POST | api/v1/admin/travels/{travel}/tours | only admin can Store Tour data  |
| GET | api/v1/travels/{travel}/tours | Get all tours in travel |
| POST | api/v1/login | Login user with sanctum |


| API | Description | Link |
|---|---|---|
| Skyscanner | Skyscanner for Business | [Go!](https://skyscanner.github.io/slate/#api-documentation) |
| Sabre | Sabre® Dev Studio | [Go!](https://developer.sabre.com/docs/read/REST_APIs) |
| Galileo | Travelopro Galileo GDS API | [Go!](https://www.travelopro.com/galileo-gds-api-integration.php) |
| Amadeus | Amadeus Travel APIs | [Go!](https://developers.amadeus.com) |
| Rome2rio | Rome2rio API partner program | [Go!](https://www.rome2rio.com/documentation/) |
| Travelfusion | Travelfusion search and book api | [Go!](http://xmldocs.travelfusion.com/home/search-and-book-api) |
| Ebookers | ebookers API | [Go!](https://www.ebookers.com/p/network-affiliate) |
| Wego | Wego Flights API | [Go!](http://support.wan.travel/hc/en-us/articles/200191669) |
| Allmyles | Allmyles Flights API | [Go!](http://docs.allmyles.apiary.io/#) |
| Trawex | Trawex Universal Flight API | [Go!](https://www.trawex.com/flight-api.php) |
