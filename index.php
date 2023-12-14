<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoogleBooks</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        td{
            border-bottom: 1px solid #ccc;
            border-left: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Book検索</h1>
    <h2>本を検索して、お気に入りを1冊だけ登録してね</h2>
    <div>
        <input type="text" id="key">
        <button id="send">検索</button>
    </div>
    <div>
        <table id="list">
           
        </table>
        <button id="getCheckedValuesButton">選んだ書籍を登録する</button>
    </div>

    <!-- Head[Start] -->
    <!-- <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header> -->
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <!-- <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>Email：<input type="text" name="email"></label><br>
                <label><textArea name="content" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div> 
    </form> -->
    <!-- Main[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>書籍登録</legend>
                <label for="title" id="selectedBookLabel1">Title:<input type="text" id="title" name="title"></label><br>
                <label for="publisher" id="selectedBookLabel2">出版社:<input type="text" id="publisher" name="publisher"></label><br>
                <label for="link" id="selectedBookLabel3">URL:<input type="text" id="link" name="link"></label><br>
                <label for="imgLink" id="selectedBookLabel4">画像のURL:<input type="text" id="imgLink" name="imgLink"></label><br>

                <!-- <label for="Label1" id="selectedBookLabel1">Title:<input type="text" id="title" name="book"></label><br>
                <label for="Label2" id="selectedBookLabel2">出版社:<input type="text" id="publisher" name="publisher"></label><br>
                <label for="Label3" id="selectedBookLabel3">URL:<input type="text" id="link" name="link"></label><br>
                <label for="Label4" id="selectedBookLabel4">画像のURL:<input type="text" id="imgLink" name="imgLink"></label><br> -->
                <input type="submit" value="データベースに登録する">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    //検索ボタンをクリックしたら
    $("#send").on("click",function(){
        const url = "https://www.googleapis.com/books/v1/volumes?q="+$("#key").val(); 
        $.ajax({
            url: url,
            dataType: "json"
        }).done(function(data) {
            //書籍名、出版社、サムネイル[リンク]
            console.log(data);             //オブジェクトの中を確認
            const len = data.items.length; //データの数を取得
            let html;
            for(let i=0; i<len; i++){
                console.log(typeof data.items[i].volumeInfo.publisher);
                if(typeof data.items[i].volumeInfo.publisher=="undefined"){
                    data.items[i].volumeInfo.publisher="出版社（不明）";
                }
                const title = data.items[i].volumeInfo.title;
                const publisher = data.items[i].volumeInfo.publisher;
                const link = data.items[i].volumeInfo.infoLink;
                const thumbnail = data.items[i].volumeInfo.imageLinks.thumbnail;

                const bookData = JSON.stringify({ title, publisher, link, thumbnail });
                //const bookJ = JSON.stringify(data.items[i]); // Convert book object to JSON string
                html += `
                <tr>
                        <td>${title}</td>
                        <td>${publisher}</td>
                        <td>
                            <a target="_blank" href="${data.items[i].volumeInfo.infoLink}">
                                <img src="${thumbnail}">
                            </a>
                        </td>
                        <td>
                        <td><label><input type="checkbox" class="myCheckbox"></label></td>
                    </tr>
                `;
            }

            //table要素のid="list"に追加
            $("#list").empty().hide().append(html).fadeIn(1000);
        });
    });

    // $("#list").on("change", ".myCheckbox", function () {
    //     const selectedBookData = $(this).data("book");
    //     console.log("Selected Book Data:", selectedBookData);
    // });

     // ボタンがクリックされたときに選択されたチェックボックスのデータを表示する
    //  $("#getCheckedValuesButton").off("click").on("click", function () {
    //     const selectedBookDataArray = $(".myCheckbox:checked").map(function () {
    //         return $(this).data("book");
    //         }).get();

    //         console.log("Selected Book Data:", selectedBookDataArray);
    //     });

    $("#getCheckedValuesButton").off("click").on("click", function () {
    const selectedBookDataArray = $(".myCheckbox:checked").map(function () {
        const row = $(this).closest("tr");
        return {
            title: row.find("td:eq(0)").text(),
            publisher: row.find("td:eq(1)").text(),
            link: row.find("a").attr("href"),
            thumbnail: row.find("img").attr("src")
        };
    }).get();

    console.log("Selected Book Data:", selectedBookDataArray);

    // チェックされた書籍データが1つだけの場合
if (selectedBookDataArray.length === 1) {
    const bookData = selectedBookDataArray[0];

    // 各 input 要素に選択された書籍データをセット
    $(`#title`).val(bookData.title || '');
    $(`#publisher`).val(bookData.publisher || '');
    $(`#link`).val(bookData.link || '');
    $(`#imgLink`).val(bookData.thumbnail || '');
} else {
    // チェックされた書籍データが1つでない場合の処理
    alert("好きな本を1冊だけ選んでね");
}

    // 各 input 要素に選択された書籍データをセット
//     selectedBookDataArray.forEach(function (bookData, index) {
//         $(`#title`).val(bookData.title || '');
//         $(`#publisher`).val(bookData.publisher || '');
//         $(`#link`).val(bookData.link || '');
//         $(`#imgLink`).val(bookData.thumbnail || '');
//     });
 });





        // $.ajax({
        //     type: "POST",
        //     url: "insert.php",
        //     data: { selectedBooks: JSON.stringify(selectedBookDataArray) },
        //     success: function (response) {
        //         console.log("Data successfully sent to insert.php");
        //         console.log(response); // insert.php からの応答を表示
        //     },
        //     error: function (error) {
        //         console.error("Error sending data to insert.php", error);
        //     }
        // });
    //});


    </script>


</body>

</html>
