
    var correctCount = 0;
    var state = 0;
    var elmode = 4;
    $(document).ready(function () {

        $('.editable').each(function () {
            this.contentEditable = true;
        });

        $(".editable").on("keypress", function (e) {
            var charCode = (e.charCode) ? e.charCode : ((e.which) ? e.which : e.keyCode);
            if (charCode == 32) {
                var nameAttr = $(this).attr("name").split("-");
                var normalisedWord = nameAttr[0];
                var fullWord = nameAttr[1];
                var txtVal = $(this).text();
                var correct = false;
                if (elmode != "4") {
                    correct = txtVal.toLowerCase().substring(0, 1) == normalisedWord.toLowerCase().substring(0, 1);
                } else {
                    correct = txtVal.toLowerCase() == normalisedWord.toLowerCase();
                }
                if (correct) {
                    $(this).html("<span class='word-correct'>" + fullWord + "</span>");
                    correctCount++;
                } else {
                    if (txtVal.trim() != "") {
                        $(this).html("<span class='word-strike'>" + txtVal + "</span>&nbsp;");
                    } else {
                        $(this).html("<span class='word-incorrect'>" + fullWord + "</span>");
                    }
                }
                $(this).attr("contenteditable", "false");
                if (charCode == 32) {
                    $(this).attr("p", "true");
                    $(this).nextAll(".editable:first").focus();
                    e.preventDefault();
                    if ($("#inputContainer").find("div:empty").length == 0 && $('#testType').val() == "1") {
                        processResult(correctCount, $(".total-words-count").text(), "Total words: ", "Correct words typed: ");
                    }
                }
            }
        });

        $('.editable').blur(function () {

            if ($(this).text().trim() != "" && $(this).attr("p") == "false") {
                var first = $(this).text().trim().substring(0, 1);

                var nameAttr = $(this).attr("name").split("-");
                var normalisedWord = nameAttr[0];
                var fullWord = nameAttr[1];

                if (first.toLowerCase().substring(0, 1) == normalisedWord.toLowerCase().substring(0, 1)) {
                    $(this).html("<span class='word-correct'>" + fullWord + "</span>");
                    correctCount++;
                } else {
                    if ($(this).text().trim() != "") {
                        $(this).html("<span class='word-strike'>" + $(this).text() + "</span>&nbsp;<span class='word-incorrect'>" + fullWord + "</span>");
                    } else {
                        $(this).html("<span class='word-incorrect'>" + fullWord + "</span>");
                    }
                }
                $(this).attr("contenteditable", "false");
                $(this).attr("p", "true");
                if ($("#inputContainer").find("div:empty").length == 0 && $('#testType').val() == "1") {
                    processResult(correctCount, $(".total-word").text(), "Total words: ", "Correct words typed: ");
                }
            }
        });


        $("#inputContainer").on("click", function () {
            var emptyEle = $(this).find("div[p='false']");
            if (emptyEle.length > 0) {
                emptyEle.get(0).focus();
            }
        });

    });


    var total=$(".total-word").html();
    function result_ditation() {
        var efficient = parseFloat(correctCount/total*100).toFixed(2);
        $(".total-text").html(total);
        $(".correct-text").html(Math.ceil(correctCount/2));
        $(".efficient").html(efficient);
    }