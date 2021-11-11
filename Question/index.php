<?php

$baseUrl = "\"https://api.judge0.com\"";
$authenHeader = "\"X-Auth-Token\"";
$authorHeader = "\"X-Auth-User\"";
$authenToken = "\"\"";
$authorToken = "\"\"";
$stdin = "\"hi\"";
$expectedOutput = "\"1\"";


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link href="question.css" rel="stylesheet">

</head>

<body style="padding: 16px 40px 40px 40px;">



    <div class="title">
        <h1><?php
            echo "October 18,2017.";
            ?>
        </h1>
        <div class="alert alert-light" role="alert">
            <div class="info">
                Time limit : <?php echo "100ms" ?>
            </div>
            <div class="info">Memory limit : <?php echo "1mb" ?> </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body" id="ques_desc">
            <?php echo "It was October 18,2017.Shohag,a melancholic soul,made a strong determination that he will pursue Competitive Programming seriously,by heart,because he found it fascinating.Fast forward to 4 years,he is happy that he took this road.He is now creating a contest on Codeforces.He found an astounding problem but has no idea how to solve this.Help him to solve the final problem of the round.You are given three integers n,k and x.Find the number,modulo 998244353,of integer sequences a1,a2,…,an
such that the following conditions are satisfied:0≤ai<2k
for each integer i from 1 to n.There is no non-empty subsequence in a
such that the bitwise XOR of the elements of the subsequence is x.A sequence b
is a subsequence of a sequence c if b can be obtained from c by deletion of several(possibly,zero or all)elements." ?>
        </div>
    </div>

    <select style="width: 300px;" name="languageId" class="form-select" id="language">
        <option selected>Select Language </option>
        <option value="52">C</option>
        <option value="53">C++</option>
        <option value="54">Java</option>
    </select>

    <label for="code" class="form-label">Enter your source code:</label>
    <div class="mb-3" id="editor" rows="10">
    </div>

    <div class="spinner-border text-primary" role="status" id="loader">
        <span class="visually-hidden">Loading...</span>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <div id="status">

        <h2>Result: </h2><br>

        <div class="alert  d-flex align-items-center" role="alert" id="status-type">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use id="status-icon" xlink:href="#check-circle-fill" />
            </svg>
            <div id="log">
            </div>
        </div>
    </div>

    <div id="panel" style="padding: 0px 20px 20px 0px;">
        <button type="button" class="btn btn-primary" id="run">Submit</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/ace.js" type="text/javascript" charset="utf-8"></script>


    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/eclipse");


        const lang_map = {
            52: "c_cpp",
            53: "c_cpp"
        }

        $('#language').on('change', function() {
            console.log(`ace/mode/${lang_map[this.value]}`);
            editor.session.setMode(`ace/mode/${lang_map[this.value]}`);
        });

        $("#loader").hide()

        var stopFetch = false;

        function resetButtons() {
            stopFetch = false;
        }

        function appendToLog(text, type) {
            $("#log").text($("#log").text() + "\n" + text + "\n");
            $('html, body').animate({
                scrollTop: $("body")[0].scrollHeight
            }, 500);
        }

        function handleError(jqXHR, textStatus, errorThrown) {
            $("#loader").hide();
            appendToLog(`[Response ${new Date().toLocaleString()}] ${jqXHR.status} ${jqXHR.statusText}\n${JSON.stringify(jqXHR, null, 4)}\n`);
            appendToLog(`[DONE ${new Date().toLocaleString()}]\n\n\n`);
            resetButtons();
        }

        function setResult(status) {
            const map = {
                3: ["alert-success", "#check-circle-fill"],
                6: ["alert-danger", "#exclamation-triangle-fill"],
                2: ["alert-warning", "#exclamation-triangle-fill"]
            }

            $("#status-icon").attr("xlink:href", map[status.id][1])
            $("#status-type").addClass(map[status.id][0])
            $("#log").text(status.description)
        }

        function fetchSubmission(token) {
            const settings = {
                "async": true,
                "crossDomain": true,
                "url": `https://judge0-ce.p.rapidapi.com/submissions/${token}?base64_encoded=true`,
                "method": "GET",
                "headers": {
                    "x-rapidapi-host": "judge0-ce.p.rapidapi.com",
                    "x-rapidapi-key": "43ade0036dmsh815af51ba9390ebp1a0a8ejsn5efa59df7f75"
                }
            };
            $.ajax(settings).done(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                $("#status").show();
                setResult(data.status)
                if (data.compile_output) {
                    appendToLog("\n" + atob(data.compile_output))
                }
                if ((data.status === undefined || data.status.id <= 2) && (data.status_id === undefined || data.status_id <= 2) && !stopFetch) {
                    setTimeout(fetchSubmission.bind(null, token), 1500);
                }
            }).fail(handleError);;
        }



        $("#run").click(function() {

            $("#loader").show()

            var sourceCode = editor.getValue();

            var languageId = $("select[name=languageId]").val();

            var stdin = "2"
            var expectedOutput = "3"

            const settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://judge0-ce.p.rapidapi.com/submissions?base64_encoded=true",
                "method": "POST",
                "headers": {
                    "content-type": "application/json",
                    "x-rapidapi-host": "judge0-ce.p.rapidapi.com",
                    "x-rapidapi-key": "43ade0036dmsh815af51ba9390ebp1a0a8ejsn5efa59df7f75"
                },
                "processData": false,
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                data: JSON.stringify({
                    "language_id": languageId,
                    "source_code": btoa(sourceCode),
                    "stdin": btoa(stdin)
                }),
            };

            $.ajax(settings).done(function(data, textStatus, jqXHR) {
                setTimeout(fetchSubmission.bind(null, data.token), 1500);
            }).fail(handleError);
        });
    </script>
</body>

</html>