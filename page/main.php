<?php include "../db.php"; ?>

<head>
	<meta charset="utf-8" />
	<title>메인페이지</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
		let frown=0;
				let total=100;

        let mini = 600;
        function plus(amount){
            mini += amount * 60;
            if(mini<0){
                mini=0;
            }
            $("#minutes").text(mini/60+" 분");
        }
        function startTimer() {
            $("#webcam-container").show();
            $("#label-container").show();
            let min = 0;
            let sec = 0;
            let x = setInterval(function () {
                min = Math.floor(mini / 60);
                sec = mini % 60;
                $("#demo").text(min + "분" + sec + "초");
                mini--;
                if (mini < 0) {
                    mini=0;
                    clearInterval(x);
                    $("#webcam-container").hide();
                    $("#label-container").hide();
                    alert("타이머 종료");
                    $("#demo").text("끝");
                }
            }, 1000);
        }
    </script>
</head>
<body>
    <div id="webcam-container"></div>
    <div id="label-container"></div>

    <div>
        <label for="minutes">Set Timer : </label>
        <label id="minutes">10 분</label>
        <button type="button" class="btn btn-outline-primary mbtn" onclick="plus(1)">+1분</button>
        <button type="button" class="btn btn-outline-primary mbtn" onclick="plus(-1)">-1분</button>
        <button type="button" class="btn btn-outline-primary mbtn" onclick="plus(5)">+5분</button>
        <button type="button" class="btn btn-outline-primary mbtn" onclick="plus(-5)">-5분</button>
        <button type="button" class="btn btn-outline-primary mbtn" onclick="startTimer();init()">시작</button>
        <div id = "demo"></div>

        <div id="webcam-container"></div>
        <div id="label-container"></div>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
        <script type="text/javascript">
            const URL = "../my_model/";
            let model, webcam, labelContainer, maxPredictions;

            async function init() {

                const modelURL = URL + "model.json";
                const metadataURL = URL + "metadata.json";

                model = await tmImage.load(modelURL, metadataURL);
                maxPredictions = model.getTotalClasses();

                const flip = true; // whether to flip the webcam
                webcam = new tmImage.Webcam(200, 200, flip); // width, height, flip
                await webcam.setup(); // request access to the webcam
                await webcam.play();
                window.requestAnimationFrame(loop);

                document.getElementById("webcam-container").appendChild(webcam.canvas);
                labelContainer = document.getElementById("label-container");
                for (let i = 0; i < maxPredictions; i++) { // and class labels
                    labelContainer.appendChild(document.createElement("div"));
                }
            }

            async function loop() {
                webcam.update(); // update the webcam frame
                await predict();
                window.requestAnimationFrame(loop);
            }

            // run the webcam image through the image model
            async function predict() {
                // predict can take in an image, video or canvas html element
                const prediction = await model.predict(webcam.canvas);

								if (prediction[0].className == "basic" && prediction[0].probability.toFixed(2) > 0.70) {
                     labelContainer.childNodes[0].innerHTML = "계속 유지 바람"
                     total++;
                 } else if (prediction[1].className == "Frown" && prediction[1].probability.toFixed(2) > 0.70) {
                     labelContainer.childNodes[0].innerHTML = "찌푸림 하지 마세요!"
                     frown++;total++;
                 } else if (prediction[2].className == "close" && prediction[2].probability.toFixed(2) > 0.70) {
                     labelContainer.childNodes[0].innerHTML = "가까이 보지 마세요!"
                     frown++;total++;
                 } else if (prediction[3].className == "squint" && prediction[3].probability.toFixed(2) > 0.70) {
                     labelContainer.childNodes[0].innerHTML = "곁눈질은 나빠요."
                     frown++;total++;
                 } else {
                     labelContainer.childNodes[0].innerHTML = "인식 안됨"
                 }

/*

			          for (let i = 0; i < maxPredictions; i++) {
                    const classPrediction =
                        prediction[i].className + ": " + prediction[i].probability.toFixed(2);
                    labelContainer.childNodes[i].innerHTML = classPrediction;
                }

 */
                  console.log("frown : "+frown+"total : "+total);
                  if(frown/total>0.4)
                  {
	 alert("안과를 가보세요");
	 frown = 0;
	 total = 100;
}

}

        </script>
        <button type="button" class="btn btn-outline-danger mbtn" onclick="location.href='/member/logout.php/'">로그아웃</button>
    </div>
</body>
