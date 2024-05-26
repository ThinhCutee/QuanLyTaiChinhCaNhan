<!DOCTYPE html>
<html>
<head>
    <style>
        section {
            margin-top: 50px;
        }

        .content {
            background-color: #007bff;
            border-radius: 10px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            text-align: center;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn {
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .row {
            margin-bottom: 20px;
        }

        .col-md-6 {
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="font-weight-light text-center py-5" style="font-size:50px">XUẤT DỮ LIỆU</h1>
        <form action="index.php?page=xuat&xly=1" method="post">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-6 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="start">Từ ngày:</label>
                                    <input type="date" id="start" name="start" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="end">Đến ngày:</label>
                                    <input type="date" id="end" name="end" class="form-control" required>
                                </div>
                                <div class="form-group dis-none">
                                    <input name="file_type" value="pdf">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-center mt-3">
                            <div class="col-md-6 text-center">
                                <input type="hidden" name="xuat">
                                <button type="submit" name="xuat1" class="btn btn-primary">Xuất dữ liệu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</body>
</html>