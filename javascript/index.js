const URL = "../my_model/";
var _loaded = {};
function addScript(url) {
    if (!loaded[url]) {
        var s = document.createElement('script');
        s.src = url;
        document.head.appendChild(s);
        _loaded[url] = true;
    }
}
addScript("https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js");
addScript("https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js");

let model, webcam, labelContainer, maxPredictions;


async function init() {
    const modelURL = URL + "model.json";
    const metadataURL = URL + "metadata.json";

    
    model = await tmImage.load(modelURL, metadataURL);
    maxPredictions = model.getTotalClasses();

    
    const flip = true; 
    webcam = new tmImage.Webcam(200, 200, flip); 
    await webcam.setup();
    await webcam.play();
    window.requestAnimationFrame(loop);

    
    document.getElementById("webcam-container").appendChild(webcam.canvas);
    labelContainer = document.getElementById("label-container");
    for (let i = 0; i < maxPredictions; i++) { 
        labelContainer.appendChild(document.createElement("div"));
    }
}

async function loop() {
    webcam.update();
    await predict();
    window.requestAnimationFrame(loop);
}


async function predict() {
    
    const prediction = await model.predict(webcam.canvas);
    if(prediction[0].className == "good" && prediction[0].probability.toFixed(2) > 0.80){
        labelContainer.childNodes[0].innerHTML = "Keep it that way."
    } else if(prediction[1].className == "Closer" && prediction[1].probability.toFixed(2) > 0.80){
        labelContainer.childNodes[0].innerHTML = "Don't look up close."
    } else if(prediction[2].className == "a side glance" && prediction[2].probability.toFixed(2) > 0.80){
        labelContainer.childNodes[0].innerHTML = "Don't spill it."
    } else if(prediction[3].className == "frown" && prediction[3].probability.toFixed(2) > 0.80){
        labelContainer.childNodes[0].innerHTML = "Don't look frowned."
    }
    else { 
        labelContainer.childNodes[0].innerHTML = "I can't recognize"
    }
    // for (let i = 0; i < maxPredictions; i++) {
    //     const classPrediction =
    //         prediction[i].className + ": " + prediction[i].probability.toFixed(2);
    //     labelContainer.childNodes[i].innerHTML = classPrediction;
    // }
}
var secondsRemaining;
        var intervalHandle;


        function tick(){
            // 입력값을 시간으로 가져온다
            var timeDisplay = document.getElementById("time");
            

            // 숫자를 분과 시간으로 변환
            var min = Math.floor(secondsRemaining / 60);
            var sec = secondsRemaining - (min * 60);

            //만약, 남아있는 초가 10보다 작으면 실행하고 0을 문자열 값으로 추가
            if (sec < 10) {
                sec = "0" + sec;
            }

            // 시간과 초 연결 값
            var message = min.toString() + ":" + sec;

            // 메세지 팝업 호출
            timeDisplay.innerHTML = message;

            // 끝났을때 호출
            if (secondsRemaining === -1){
                alert("Shall we quit?");
                clearInterval(intervalHandle);
                resetPage();
            }

            //지정된 초, 즉 남아있는 초에서 1씩 빼라
            secondsRemaining--;

        }

        function startCountdown(){

            // 텍스트박스의 숫자값 확인
            var minutes = document.getElementById("minutes").value;

            // 숫자가 맞는지 확인
            if (isNaN(minutes)){
                alert("Please write it down in numbers.");
                return; // 되돌아가기
            }

            // 숫자가 변동대는 사항의 Nan값을 시간으로 호출
            secondsRemaining = minutes * 60;

            // 1000 = 1초 (이부분은 1초 개념을 잡기위한 코드)
            intervalHandle = setInterval(tick, 1000);

            // 카운터 시작버튼을 누르면 없어지게 한다.
            document.getElementById("inputArea").style.display = "none";


        }

        window.onload = function(){

            //시간 작성을 생성
            var inputMinutes = document.createElement("input");
            inputMinutes.setAttribute("id", "minutes");
            inputMinutes.setAttribute("type", "text");

            //시작 버튼을 생성
            var startButton = document.createElement("input");
            startButton.setAttribute("type","button");
            startButton.setAttribute("value","start");
            startButton.setAttribute("onclick","init()");
            
            startButton.onclick = function(){
                startCountdown();
                init();
                
                
                
                
            };
            
            

            //html 코드에 아이디가 inputArea라는 태그 안에 요소추가
            document.getElementById("inputArea").appendChild(inputMinutes);
            document.getElementById("inputArea").appendChild(startButton);   
            
            
        }