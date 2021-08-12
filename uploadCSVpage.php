<!doctype html>
<html lang="en">

    <?php include "html/head.html"; ?>

    <body>
        <?php include "html/header.html"; ?>
        <div class="row col-12 p-0 m-0">
	        <div class="card-body d-flex justify-content-center">
                <form action="php/uploadCSV.php" method="post">
                    
                    <div class="col-lg-10 col-xs-12 m-2">
                        <label for="fileName">Upload File</label>
                        <input type="file" name="fileName" class="col-12" accept=".csv">
                    </div>

                    <div class="col-lg-10 col-xs-12 m-2">
                        <label for="fileName">File Name</label>
                        <input type="text" name="fileName" class="col-12" placeholder="my_file.csv">
                    </div>

                    <div class="csv-info">
                        <span class="attention">Attention! You must use the following format:</span>
                        <section class="csvSample">    
                            <p> 
                                Date,Open,High,Low,Close,Range,BodyRange,BodyColor<br>
                                12/30/2020,3736.19,3744.63,3730.21,3732.04,14.42,4.15,RED<br>
                                12/29/2020,3750.01,3756.12,3723.31,3727.04,32.81,22.97,RED<br>
                                12/28/2020,3723.03,3740.51,3723.03,3735.36,17.48,12.33,GREEN<br>
                            </p>
                        </section>
                    </div>

                    <div class="col-lg-10 col-xs-12 m-2">
                        <label for="csv_textPanel">CSV Content</label>
                        <textarea name="data" id="csv_textPanel" cols="30" rows="10" class="col-12"></textarea>
                    </div>

                    <div class="col-lg-10 col-xs-12 m-2">
				        <button type="submit" class="btn btn-primary mx-auto">Submit</button>
			        </div>

                </form>
            </div>
        </div>
    
            <?php //include "html/footer.html"; ?>

        
    <script>
        const actualLocation = window.location.search;
        const urlParams = new URLSearchParams(actualLocation);
        const errorCode = urlParams.get('errNo');
        console.log('errNo: ', errorCode);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    </body>
</html>