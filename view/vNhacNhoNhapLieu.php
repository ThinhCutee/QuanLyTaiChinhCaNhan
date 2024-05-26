<!DOCTYPE html>
<html>

<head>
    <title>Reminders</title>
    <style>
    body {
        font-family: Arial, sans-serif;

    }

    section {
        margin-top: 50px;
    }

    .content {
        background-color: #007bff;
        border-radius: 10px;
    }

    h2 {
        color: #ffffff;
        text-align: center;
        padding: 5px;
        margin: 0;
        font-size: 20pt;
    }

    .card {
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        text-align: center;
    }

    .textbox {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn {
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-outline-info {
        color: #17a2b8;
        border-color: #17a2b8;
        background-color: #fff;
    }

    .btn-outline-info:hover {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .row {
        margin-bottom: 20px;
    }

    .col-md-8 {
        margin: 0 auto;
    }

    .time-container {

        border-radius: 20px;
        background-color: #fff;
        padding: 20px;
    }
    </style>
</head>

<body>
    <h1 class="font-weight-light text-center py-5" style="font-size:50px">NHẮC NHỞ NHẬP LIỆU</h1>
    <div class="container">



        <div class="d-flex align-items-center justify-content-center" id="kq">
            <div class="col-md-6">

                <div class="card-body">
                    <div class="time-container">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title">Thời Gian:</h5>
                            </div>
                            <div class="col-md-8">
                                <input id="timeInput" style="border-radius: 5px;width: 115px;" type="time">
                            </div>
                        </div>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <button id="addButton" type="button" class="btn btn-primary">Thêm</button>
        </div>
    </div>





    <script>
    document.getElementById("addButton").addEventListener("click", function() {


        var selectedTime = document.getElementById("timeInput").value;
        var currentTime = new Date().toLocaleTimeString('en-US', {
            hour12: false,
            hour: 'numeric',
            minute: 'numeric'
        });

        var selectedDateTime = new Date();
        var currentDateTime = new Date();

        selectedDateTime.setHours(selectedTime.split(':')[0], selectedTime.split(':')[1], 0);
        currentDateTime.setHours(currentTime.split(':')[0], currentTime.split(':')[1], 0);

        var timeDifference = selectedDateTime.getTime() - currentDateTime.getTime();

        if (timeDifference > 0) {
            alert("Đã thêm thành công");
            localStorage.setItem("selectedTime", selectedTime);
            localStorage.setItem("timeDifference", timeDifference);

            setTimeout(function() {
                alert("Đã đến thời điểm: " + selectedTime);
            }, timeDifference);
        } else {
            alert("Vui lòng chọn thời gian trong tương lai.");
        }
    });

    window.addEventListener("storage", function(event) {
        if (event.key === "selectedTime") {
            var selectedTime = localStorage.getItem("selectedTime");
            var timeDifference = localStorage.getItem("timeDifference");

            if (selectedTime && timeDifference) {
                setTimeout(function() {
                    alert("Đã đến thời điểm: " + selectedTime);
                }, timeDifference);
            }
        }
    });
    </script>
</body>

</html>