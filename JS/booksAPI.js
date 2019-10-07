
preCard = `<form method="POST"> <!-- start Card --> <div class="card bg-primary"><br> <img class="card-img-top rounded mx-auto d-block" style="max-width:100px;" src="https://covers.openlibrary.org/b/id/`;
cardImg = `-M.jpg" alt="Card image"> <div class="card-body text-center"> <h4 class="card-title">`;
cardBody = `</h4> <p class="card-text">`;
cardText = `</p> <input type="submit" class="btn btn-secondary btn-sm" value="Add to Library"> </div> </div> <!-- end Card -->`;
frmEnd = `</form>`;

var url_string = window.location.href;
var url = new URL(url_string);
var q = url.searchParams.get("q");

url = `https://openlibrary.org/search.json?title=` + q;

var req = new XMLHttpRequest();
req.responseType = 'json';
req.open('GET', url, true);
req.onload = function () {
    var jsonResponse = req.response;
    jsonResponse = jsonResponse['docs']

    console.log();

    var index;
    var cards = '';
    for (index = 0; index < jsonResponse.length; ++index) {
        title = jsonResponse[index]['title'];
        auther_name = jsonResponse[index]['author_name'];
        isbn = jsonResponse[index]['isbn'];
        edition = jsonResponse[index]['edition_count'];
        publish_date = jsonResponse[index]['publish_date'];
        cover_i = jsonResponse[index]['cover_i'];
        inputs =
            `<input type="hidden" name="title" value="` + title + `">` +
            `<input type="hidden" name="author_name" value="` + auther_name + `">` +
            `<input type="hidden" name="publish_date" value="` + publish_date + `">` +
            `<input type="hidden" name="edition" value="` + edition + `">` +
            `<input type="hidden" name="isbn" value="` + isbn + `">` +
            `<input type="hidden" name="cover" value="https://covers.openlibrary.org/b/id/` + cover_i + `-M.jpg">`;



        cards = cards + preCard + cover_i + cardImg + title + cardBody + 'Auther: ' + auther_name + '(' + publish_date + ')' + cardText + inputs + frmEnd;
    }
    document.getElementById("booklist").innerHTML = cards;
    if (jsonResponse.length == 0) {
        document.getElementById("booklist").innerHTML = '<h1 class="card-title">No Books with that title...</h1>';
    }
};

if (!q) {
    document.getElementById("booklist").innerHTML = '<h1 class="card-title text-danger">Enter at least 4 or more letters</h1>';
    throw new Error("my error message");
}

document.getElementById("booklist").innerHTML = '<h1 class="card-title">Loading Search...</h1>';
req.send(null);
