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
|---|---|---|
| HTTP Method | EndPoint | Description |
| GET |  api/v1/travels | Get All Travels |
| GET | api/v1//travels/{travel:slug}/tours | Get Spacific Travel |
| POST | api/v1/admin/tavels | only admin can Store a new travel |
| PUT |  api/v1/admin/travels/{travel} | only admin can Update travel data  |
| POST | api/v1/admin/travels/{travel}/tours | only admin can Store Tour data  |
| GET | api/v1/travels/{travel}/tours | Get all tours in travel |
| POST | api/v1/login | Login user with sanctum |

