    function nextQ() 
    {
        let currentQ = document.querySelector('.activeQ');
        let input = currentQ.querySelectorAll('input,select');
        let next;
        try {
            if(input.length == 1){
                next = nextQSelect(currentQ, input[0]);
            } else if(input.length == 2) {
                next = nextQYesNo(currentQ, input);
            } else {
                next = nextQMulti(currentQ, input);
            }   
        } catch (error) {
            alert('عليك اختيار جواب')
            console.error(error);
            return;
        }

        console.log(next);
        if(next == 11){
            document.querySelector('#next_question').style.display = 'none';
        }

        let nextQ = document.querySelector(".flexDetailsInput").children[next - 1];

        currentQ.classList.remove("activeQ");
        currentQ.classList.add('inactiveQ');

        nextQ.classList.remove("inactiveQ");
        nextQ.classList.add("activeQ");
    };

    function nextQSelect(currentQ, input) {
        if(input.tagName === 'INPUT') {
            if(input.value == ''){
                throw new Error('enter value');
            }
            return input.getAttribute('data-goto');
        }
        return input.querySelector(':checked').getAttribute('data-goto');
    }

    function nextQYesNo(currentQ, input){
        for (const i in input) {
            if (Object.hasOwnProperty.call(input, i)) {
                const element = input[i];
                if(element.checked){
                    return element.getAttribute('data-goto');
                }
            }
        }

        throw new Error('You have to chose!');
    }

    function nextQMulti(currentQ, input){
        let rows = currentQ.querySelectorAll('.sounded');

        for (const i in rows) {
            if (Object.hasOwnProperty.call(rows, i)) {
                const sounded = rows[i];
                soundedYN = sounded.querySelectorAll('.soundedYN input');
                nextQYesNo(null, soundedYN);
            }
        }

        return currentQ.getAttribute('data-goto');
    }

    function addSounded()
    {

        let sounded = document.getElementById('soundedQ').cloneNode(true);

        sounded.setAttribute('id', '');
        sounded.classList.add('sounded');
    
        sounded.style.display = 'block';

        let inputs = sounded.querySelectorAll('.soundedYN input');
        let soundedNum = document.querySelectorAll('.sounded').length + 1;
        for (const i in inputs) {
            if (Object.hasOwnProperty.call(inputs, i)) {
                const element = inputs[i];
                element.setAttribute('name', 'quest_' + soundedNum);
            }
        }

        document.getElementById('sounded-q2 ').appendChild(sounded);
    }




    function newComp() {

        on();
    
    };
    function on() {
    document.querySelector(".overlay").style.display = "block";
    document.querySelector(".ContestRegistration").style.display = "block";

    }
    function off() {
        document.querySelector(".overlay").style.display = "none";
        document.querySelector(".ContestRegistration").style.display = "none";
    
    }



    function closeCard() {
        
        document.querySelector(".closeCard").addEventListener('click', function () {
        off();
        
    });
    };


    let list = document.querySelectorAll(".navigation li");
    function activeLink(){
        list.forEach((item)=>
        item.classList.remove("hovered"));
        this.classList.add("hovered");

    }

    list.forEach((item)=>
    item.addEventListener("mouseover",activeLink));


    let toggle = document.querySelector(".toggle");
    let main = document.querySelector(".main");
    let navigation = document.querySelector(".navigation");

    toggle.onclick = function(){

        navigation.classList.toggle("active")
        main.classList.toggle("active")


    }