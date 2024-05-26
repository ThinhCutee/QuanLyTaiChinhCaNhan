<style>
    .main-title {
        text-align: center;
        font-weight: bold;
        padding: 10px;
        border-radius: 20px;
    }
    .main-title h4 {
        border-radius: 30px;
        width: 600px;
    }
    .info-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px;
        margin-top: 20px;
        margin-bottom: 30px;
    }
    .form-container {
        float: left;
        position: relative;
        width: 35%;
        font-size: 20px;
        overflow: hidden;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        animation: slide-in 0.5s forwards;
        background-color:#bfe1ff;
    }
/* 
    .form-control > input {
        width: 100%;
        height: 100%;
        padding-left: 1rem;
        font-size: 1.7rem;
        color: rgb(0, 0, 0);
        background-color: #ffffff;
        transition: background-color 0.4s;
        } */
   
    .form-container label {
        display: contents;
        margin-top: 0px;
        opacity: 1;
        color: rgb(7, 7, 144);
    }
    .form-container button {
        border-radius: 0.5rem;
        cursor: pointer;
        outline: none;
        transition: all 0.4s;
        border-radius: 20px;
        font-size: 20px;
        border: none;
        color: white;
    } 
    .form-container button:hover {
        background-color:blue;
        transition: all 0.4s;
        }
    .phantich-container{
        height:430px;
        float: right;
        width: 60%;
        background-color:#bfe1ff;
        border-radius: 10px;
        
    }
    #chart {
        height: 330px;
        width: 550px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 10px;
        margin: 0 auto;
        margin-top:20px;
    }
    .summary-container {
        clear: both;
        margin-left:30px;
        }
    .summary {
        margin-top: 10px;
    }
</style>
<section>
    <div class="main-title d-flex justify-content-center mx-auto">
        <h4 class="bg-primary p-2 text-white ">Phân Tích Thu</h4>
    </div>  

    <div class="info-container">
        <div class="form-container">
            <form method="post">
                <div class="form-group">
                    <label for="phan_tich_theo">Phân tích theo</label>
                    <select class="form-control" id="phan_tich_theo" name="phan_tich_theo">
                        <option value="tuần">Tuần</option>
                        <option value="tháng">Tháng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="thoi_gian">Thời gian</label>
                    <input type="date" class="form-control" id="thoi_gian" name="thoi_gian">
                </div>
                <div class="form-group">
                    <label for="hang_muc">Hạng mục</label>
                    <select class="form-control" id="phan_tich_theo" name="phan_tich_theo" id="hang_muc" name="hang_muc">
                    <option value="all">Tất cả hạng mục</option>
                        <option value="anuong">Ăn uống</option>
                        <option value="lamdep">Làm đẹp</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tai_khoan_chi_tieu">Tài khoản chi tiêu</label>
                    <select class="form-control" id="phan_tich_theo" name="phan_tich_theo" id="tai_khoan_chi_tieu" name="tai_khoan_chi_tieu">
                        <option value="all">Tất cả tài khoản</option>
                        <option value="anuong">Tài khoản 1</option>
                        <option value="lamdep">Tài khoản 2</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary d-flex justify-content-center mx-auto">Phân tích</button>
            </form>
        </div>
    <div class="phantich-container">
        <div class="chart-container">
            <div id="chart">
                
            </div>
        </div>
        <div class="summary-container">
            <div class="summary">
                <h5>Tổng thu:</h5>
            </div>
            <div class="summary">
                <h5>Trung bình thu/ngày:</h5>
            </div>
        </div>
    </div>
</section>