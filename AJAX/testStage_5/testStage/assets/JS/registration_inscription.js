let connexion = document.querySelector("#connexion"),

    pseudoRegister = document.querySelector('#pseudo'),
    emailRegister = document.querySelector('#email'),
    passwordRegister = document.querySelector('#password')


let alertText = document.querySelector('#alertText')
document.querySelector('#connexionForm').addEventListener('submit', function (e) {
    e.preventDefault()
})

function validateEmail(email) {
    let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


function validateTest() {
    let email = emailRegister.value
    if (validateEmail(email)) {
        return 1
    } else {
        return 0
    }
}


function DisplayErrorStyle(element) {
    let errorDisplay = document.createElement("span")
    errorDisplay.classList.add("errorDisplay")
    errorDisplay.innerText = element
    return errorDisplay
}

connexion.addEventListener("click", function (e) {

///// supprimer au registerClick le text contenu dans les erreur précédement créer

    e.preventDefault()

    console.log('test')






    document.querySelectorAll('.errorDisplay').forEach(function (item) {
        item.innerText = ""

    })
    alertText.innerText = ""
    if (emailRegister.value !== "" && validateTest() !== 1) {
        emailRegister.after(DisplayErrorStyle(" Veuillez rentrer une adresse mail valide "))
    }
    if (emailRegister.value === "") {
        emailRegister.after(DisplayErrorStyle("Veuillez rentrez une adresse mail"))
    }
    if (passwordRegister.value === "") {
        passwordRegister.after(DisplayErrorStyle("Veuillez rentrez votre mot de passe"))
    }
    if (pseudoRegister.value === "") {
        pseudoRegister.after(DisplayErrorStyle("Veuillez rentrez votre pseudo"))
    }
    if (
        emailRegister.value !== "" &&
        validateTest() === 1 &&
        passwordRegister.value !== "" &&
        pseudoRegister.value !== ""
    ) {
        Connexion()
    }

})

let userJson = function () {
    let person = {
        email: emailRegister.value,
        pseudo: pseudoRegister.value,
        password: passwordRegister.value,
    }
    return person
}


let Connexion = function () {

    let person = userJson()


    fetch('http://localhost/PHP/testStage/assets/PHP/index.php', {
        method: 'POST',
        headers: new Headers(),
        body: JSON.stringify(person)
    })
        .then((res) => res.json())
        .then((data) => {
            // console.log(data)
            alertText.innerText = data.msg
            console.log(data.userConnect)

            if (data.userConnect === "userConnect") {



                document.querySelector("#connexionMain").style.display = "none"
                document.querySelector("#container").style.display = "flex"

                main_chat(data)

            }




            let js = document.createElement("script")
            js.type = "text/javascript"
            js.src = "assets/JS/main_chat.js"
            document.body.appendChild(js)

        })
        .catch((data) => {
            alertText.innerText = "erreur lors de l'enregistrement, veuillez réessayer"
        })
}






















let main_chat = function (userObject) {

  //  console.log(userObject)





    let textEntries = document.querySelector("#textEntries")
    let containerChat = document.querySelector(".containerChat")
    let leftMessage = document.querySelector(".leftMessage")
    let rightMessage = document.querySelector(".rightMessage")

    let userId = userObject.userID
    let userColor = userObject.userColor
    let userPseudo = userObject.userPseudo

    /////// scroll en bas de la zone de message
    function scrollToBottom() {
        containerChat.scrollTop = containerChat.scrollHeight;
    }


///////////////// création les élement de  la section affichant le profil
    function createProfilLeft(data) {
        let pp = document.createElement('div'),
            name = document.createElement('h3'),
            firstname = document.createElement('h3'),
            pseudo = document.createElement('h3'),
            email = document.createElement('h3'),
            dc = document.createElement('button')
        /////// insertion des données relative a l'utilisateur
        name.innerText = data.userName
        firstname.innerText = data.userFirstname
        pseudo.innerText = data.userPseudo
        email.innerText = data.userEmail
        dc.innerText = 'Déconnexion'

        return [pp, name, firstname, pseudo, email, dc]
    }

    function createdProfilLeft(data) {

        let profilLeft = createProfilLeft(data)
        ///////////////// apendChild des eleemnt créer precedament dans la dite section
        profilLeft.forEach(function (item) {
            document.querySelector('.left').appendChild(item)
        })

    }

    createdProfilLeft(userObject)

////////////////// deconnexion
    document.querySelector(".left > button").addEventListener("click", function () {
        ///////////// affiche l'ecran de deconnexion  et retire l'affichage du chat
        document.querySelector("#connexionMain").style.display = "flex"
        document.querySelector("#container").style.display = "none"
        //////// reinitialise les message d'erreur de la connexion/deconnexion
        document.querySelector("#alertText").innerText = ""
        //////////////  reinitialise  les information utilisateur afficher danss   la section affichant le profil
        let profileParent = document.querySelector('.left')
        while (profileParent.firstChild) {
            profileParent.removeChild(profileParent.firstChild);
        }
        ////// vide le contenu de lobjet principale
        userObject = ""
        return
    })

    /////////////// pour afficher tous les messages au chargement de page
    let displayAllMessage = function () {

        fetch('http://localhost/PHP/testStage/assets/PHP/displayAllMessage.php', {
            headers: new Headers(),
        })
            .then((res) => {
                return res.json()
            })
            .then((data) => {

                ///// vide les messages du chat  deja presents (si deconnexion et reconnexion par ex )
                while (containerChat.firstChild) {
                    containerChat.removeChild(containerChat.firstChild);
                }
                /*
                      data renvoie un tableau
                      arrayAllMessage: Array(8)
                      0: {user_content: "llll", user_color: "red", user_id: "1", user_pseudo: "richardD"}
                      1: {user_content: "sam", user_color: "red", user_id: "1", user_pseudo: "richardD"}
                      2: {user_content: "wala", user_color: "green", user_id: "3", user_pseudo: "leoL"}

                     On prend sa taille   data.arrayAllMessage.length pour le parcourir

                 */
                console.log(data)
                ////////// créer message par message le contenu du tableau
                for (let i = 0; i < data.arrayAllMessage.length; i++) {

                    let userColor = data.arrayAllMessage[i]["user_color"]
                    let messageContent = data.arrayAllMessage[i]["message_content"]
                    let messageTime = data.arrayAllMessage[i]["message_time"]
                    let userPseudo = data.arrayAllMessage[i]["user_pseudo"]
                    let positionMessage = data.arrayAllMessage[i]['positionMessage']

                    //// envoie  dans creatMessage tous le contenu d'un message
                    creatMessage(userColor, messageContent, messageTime, userPseudo, positionMessage)

                }
                ///////////////  au chargement de page  affiche le premier message
                scrollToBottom()
            })

            .catch((data) => {
                console.log("Le chargement de tous vos message a échoué, veuillez réessayer")
            })
    }

    displayAllMessage()
    /////////////// fonction de creation de message
    let creatMessage = function ( userColor, messageContent, messageTime, userPseudo, positionMessage) {


       console.log(messageTime)
        let messageRow = document.createElement('div')
        let message = document.createElement('div')
        //   si le userId du message correspond au userId de l'utilisateur connecté, alors mettre le message a gauche sinon a droite
        //    ainsi chaque message de  l'utilisateur connecté sera tjr a droite


        if (positionMessage === "right") {
            messageRow.classList.add('rightMessage')
            message.classList.add('bubbleMe')
        } else {
            messageRow.classList.add('leftMessage')
            message.classList.add('bubbleThird')
        }

        let messagePseudo = document.createElement("span")
        messagePseudo.classList.add("pseudoMessage")
        messagePseudo.innerText = userPseudo

        let messageDate = document.createElement("span")
        messageDate.classList.add("dateMessage")
        messageDate.innerText = messageTime


        message.style.backgroundColor = (userColor)

        let para = document.createElement('p')
        para.innerText = messageContent


        message.appendChild(para)
        messageRow.appendChild(message)
        messageRow.appendChild(messagePseudo)
        messageRow.appendChild(messageDate)


        let mess = document.querySelector('.containerChat')
        mess.appendChild(messageRow)



        return mess

    }

    ///// quand on appui sur entrée dans  le champs text  ca envoie a createNewMessage les valuers a inserer dans un message
    textEntries.addEventListener('keypress', function (event) {
        if (event.keyCode === 13) {
            ////// previens le retour a la ligne
            event.preventDefault()
            if (textEntries.value === ""){
                return
            } else{
                createNewMessage(textEntries.value)
            }
        }

    });
/////////////// fonction qui rajoute un nouveau message en bd
    let createNewMessage = function (valueMessage) {
        let objectMessage

        objectMessage = {
            valueMessage: valueMessage,
        }


        fetch('http://localhost/PHP/testStage/assets/PHP/create_message.php', {
            method: 'POST',
            headers: new Headers(),
            body: JSON.stringify(objectMessage)
        })
            .then((res) => {
                return res.json()
            })
            .then((data) => {
                ///// vide le champ text
                textEntries.value = ""
                ///// créer le message si tous c'est bien passé
                creatMessage( data.userColor, data.messageContent, data.messageTime, data.userPseudo, data.positionMessage)
                //////// scroll en bas pour qu'on puisse voir le dernier messag
                scrollToBottom()

            })

            .catch(() => {
                console.log("La création de votre message a échoué, veuillez réessayer ")
            })


    }
    ////// fonction faisant la verif de nouveau message et de l'affiche de ceux ci

    let displayUpdateMessage = function (){

        fetch('http://localhost/PHP/testStage/assets/PHP/display_update_message.php', {
            headers: new Headers()
        })
            .then((res) => {
                return res.json()
            })
            .then((data) => {
                    if (data.msg !== "") {
                        //console.log(data.msg)
                    }

                console.log(data)

                console.log(data.arrayAllNewMessage[0]["messageTime"])

                    for (let i = 0; i < data.arrayAllNewMessage.length; i++) {

                        let userContent = data.arrayAllNewMessage[i]["user_content"]
                        let userColor = data.arrayAllNewMessage[i]["user_color"]
                        let userPseudo = data.arrayAllNewMessage[i]["user_pseudo"]
                        let messageTime = data.arrayAllNewMessage[i]["messageTime"]
                        let positionMessage = data.arrayAllNewMessage[i]['positionMessage']

                        //// envoie  dans creatMessage tous le contenu d'un message
                        creatMessage(userColor, userContent, userPseudo, messageTime, positionMessage)

                    }
                    scrollToBottom()

                    return
                //displayUpdateMessage()

            })

            .catch(() => {
                console.log("impossible d'afficher de nouveaux articles")
            })
    }


    setInterval(displayUpdateMessage, 2500)


  /*  let displayChannel = function () {

        fetch('http://localhost/PHP/testStage/assets/PHP/display_channel.php', {
            headers: new Headers(),
        })
            .then((res) => {
                return res.json()
            })
            .then((data) => {

               console.log(data)
            })

            .catch((data) => {
                console.log("Le chargement de tous les channel a échoué")
            })
    }
    displayChannel() */
}

