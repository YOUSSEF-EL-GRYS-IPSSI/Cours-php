class Book {
  constructor(title, author, isbn) {
    this.title = title;
    this.author = author;
    this.isbn = isbn;
  }
}

class UI {
  addBookToList(book) {
    const list = document.getElementById('book-list');
    // Create tr element
    const row = document.createElement('tr');
    // Insert cols
    row.innerHTML = `
      <td>${book.title}</td>
      <td>${book.author}</td>
      <td>${book.isbn}</td>
      <td><a href="#" class="delete">X<a></td>
    `;

    list.appendChild(row);
  }

  showAlert(message, className) {
    // Crée une div
    const div = document.createElement('div');
    // ajouter une classe
    div.className = `alert ${className}`;
    // ajouter un texte
    div.appendChild(document.createTextNode(message));
    // obtenir la classe parent
    const container = document.querySelector('.container');
    // obtenir le formulaire
    const form = document.querySelector('#book-form');
    // Insérer une alerte
    container.insertBefore(div, form);

    // Délai d'attente après 3 secondes
    setTimeout(function(){
      document.querySelector('.alert').remove();
    }, 3000);
  }

  deleteBook(target) {
    if(target.className === 'delete') {
      target.parentElement.parentElement.remove();
    }
  }

  clearFields() {
    document.getElementById('title').value = '';
    document.getElementById('author').value = '';
    document.getElementById('isbn').value = '';
  }
}

// Classe de stockage local
class Store {
  static getBooks() {
    let books;
    if(localStorage.getItem('books') === null) {
      books = [];
    } else {
      books = JSON.parse(localStorage.getItem('books'));
    }

    return books;
  }

  static displayBooks() {
    const books = Store.getBooks();

    books.forEach(function(book){
      const ui  = new UI;

      // Ajouter un article à l'interface utilisateur
      ui.addBookToList(book);
    });
  }

  static addBook(book) {
    const books = Store.getBooks();

    books.push(book);

    localStorage.setItem('books', JSON.stringify(books));
  }

  static removeBook(isbn) {
    const books = Store.getBooks();

    books.forEach(function(book, index){
     if(book.isbn === isbn) {
      books.splice(index, 1);
     }
    });

    localStorage.setItem('books', JSON.stringify(books));
  }
}

// evénement de chargement DOM
document.addEventListener('DOMContentLoaded', Store.displayBooks);

// auditeur d'événement pour ajouter un article
document.getElementById('book-form').addEventListener('submit', function(e){
  // Obtenir les valeurs du formulaire
  const title = document.getElementById('title').value,
        author = document.getElementById('author').value,
        isbn = document.getElementById('isbn').value

  // instancier l'article
  const book = new Book(title, author, isbn);

  // instancier l'interface utilisateur
  const ui = new UI();

  console.log(ui);

  // validation
  if(title === '' || author === '' || isbn === '') {
    // Erreur alert
    ui.showAlert('Merci de remplir tous les champs', 'error');
  } else {
    // ajouter un article à la liste
    ui.addBookToList(book);


    Store.addBook(book);

    // affiché le succée
    ui.showAlert('Article ajouté!', 'success');

    // Effacer l'article
    ui.clearFields();
  }

  e.preventDefault();
});

// Event Listener pour supprimé
document.getElementById('book-list').addEventListener('click', function(e){

  // instantier UI
  const ui = new UI();

  // supprimer l'artcle
  ui.deleteBook(e.target);

  // supprimer de Liste
  Store.removeBook(e.target.parentElement.previousElementSibling.textContent);

  // Voir le message
  ui.showAlert('Book Removed!', 'success');

  e.preventDefault();
});