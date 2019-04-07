

let main_chat = function (userObject) {





     console.log(userObject)


    let textEntries = document.querySelector("#textEntries")
    let containerChat = document.querySelector(".containerChat")



    /////// scroll en bas de la zone de message
    function scrollToBottom() {
        containerChat.scrollTop = containerChat.scrollHeight;
    }


///////////////// création les élement de  la section affichant le profil
    function createProfilLeft() {

        let pp = document.createElement('div'),
            name = document.createElement('h3')
        pp.classList = "profilPicture"

        fetch('http://localhost/PHP/testStage/testStage/assets/PHP/pseudo_user.php', {
            headers: new Headers(),
        })
            .then((res) => { return res.json() })
            .then((data) => { name.innerText = data['userName'] })
            .catch(() => { console.log("Votre nom na pas pu etre chargé") })

        let profilLeft = [pp, name]

        profilLeft.forEach(function (item) {
            document.querySelector('.left').insertBefore(item, document.querySelector(".left > button"))
        })

    }

    createProfilLeft()


// * ////////////////// deconnexion
 /*   document.querySelector(".left > button a").addEventListener("click", function () {

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
        return
    })
 */



    let displayAllMessageChat = function(data){
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
    }


    /////////////// fonction de creation de message
    let creatMessage = function (userColor, messageContent, messageTime, userPseudo, positionMessage) {

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
            if (textEntries.value === "") {
                return
            } else {
                createNewMessage(textEntries.value)
            }
        }

    });
/////////////// fonction qui rajoute un nouveau message en bd
    let createNewMessage = function (valueMessage) {
        let objectMessage
        let channelId = document.querySelector('.containerChat').getAttribute("data-channel_id")

        objectMessage = {
            channelId : channelId,
            valueMessage: valueMessage,
        }

        fetch('http://localhost/back/testStage/testStage/assets/PHP/create_message.php', {
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
                creatMessage(data.userColor, data.messageContent, data.messageTime, data.userPseudo, data.positionMessage)
                //////// scroll en bas pour qu'on puisse voir le dernier messag
                scrollToBottom()

            })

            .catch(() => {
                console.log("La création de votre message a échoué, veuillez réessayer ")
            })


    }
    ////// fonction faisant la verif de nouveau message et de l'affiche de ceux ci

    let displayUpdateMessage = function () {

        fetch('http://localhost/back/testStage/testStage/assets/PHP/display_update_message.php', {
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
            })

            .catch(() => {
                console.log("impossible d'afficher de nouveaux articles")
            })
    }

    setInterval(displayUpdateMessage, 2500)

    let displayChannel = function () {

        fetch('http://localhost/back/testStage/testStage/assets/PHP/display_channel.php', {
            headers: new Headers(),
        })
            .then((res) => {
                return res.json()
            })
            .then((data) => {
                console.log(data.arrayAllUserChannel.length-1)
                for (let i = 0; i <= data.arrayAllUserChannel.length-1; i++) {

                    let channel_description = data.arrayAllUserChannel[i]["channel_description"]
                    let channel_title = data.arrayAllUserChannel[i]["channel_title"]
                    let channel_id = data.arrayAllUserChannel[i]["channel_id"]

                    createChannelName(channel_description, channel_title, channel_id)
                }
            })

            .catch((data) => {
                console.log("Le chargement de tous les channel a échoué")
            })
    }
    displayChannel()

    createChannelName("seront afficher ici", "Tous les messages", "1000")

    function createChannelName(channel_description, channel_title, channel_id) {
        let channelContainer = document.createElement("div")
        channelContainer.classList = "channelContainer"


        let channelDescription = document.createElement("h6")
        let channelTitle = document.createElement("span")

        channelTitle.innerText = channel_title

        channelDescription.innerText = channel_description

        channelContainer.appendChild(channelDescription)


        channelContainer.appendChild(channelTitle)

        channelContainer.setAttribute("data-channel_id", channel_id)

         document.querySelector('.left').insertBefore(channelContainer, document.querySelector(".left > button"))

        channelContainer.addEventListener("click", function () {

                queryContentChannel(this.getAttribute("data-channel_id"))


        })

    }


    let queryContentChannel = function (selectedChannel) {

        document.querySelector('.containerChat').setAttribute("data-channel_id", selectedChannel)


        fetch('http://localhost/back/testStage/testStage/assets/PHP/selectedChannel.php', {
            method: 'POST',
            headers: new Headers(),
            body: JSON.stringify(selectedChannel)
        })
            .then((res) => {
                return res.json()
            })
            .then((data) => {
                displayAllMessageChat(data)
            })

            .catch((data) => {
                console.log("Le chargement de tous les channel a échoué")
            })



    }
    queryContentChannel("1000")


}


fetch('http://localhost/back/testStage/testStage/assets/PHP/connexion_verif.php', {
    headers: new Headers(),
})
    .then((res) => {
        return res.json()
    })
    .then((data) => {
     console.log(data)
main_chat(data)
    })

    .catch(() => {
        console.log("La création de votre message a échoué, veuillez réessayer ")
    })



