import axios from "axios";

class Search {
  constructor() {
    this.addSearchHTML();
    this.searchResults = document.querySelector("#search__overlay--results");
    this.openButton = document.querySelector(".search__button--trigger");
    this.closeButton = document.querySelector(".search__button--closer");
    this.searchOverlay = document.querySelector(".search__overlay");
    this.searchInput = document.querySelector(".input__style");
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
    this.events();
  }

  // events
  events() {
    this.openButton.addEventListener("click", this.openOverlay.bind(this));
    this.closeButton.addEventListener("click", this.closeOverlay.bind(this));
    document.addEventListener("keyup", this.keyPressDispatcher.bind(this));
    this.searchInput.addEventListener("keyup", this.searchTypeLogic.bind(this));
  }

  // methods
  searchTypeLogic() {
    if (this.searchInput.value !== this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchInput.value) {
        if (!this.isSpinnerVisible) {
          this.searchResults.innerHTML = `
          <div class=" container d-flex justify-content-center">
          <div class="loadingio-spinner-double-ring-0510ml3bcrk2"><div class="ldio-2yeatgqhmtl">
                <div></div>
                <div></div>
                <div><div></div></div>
                <div><div></div></div>
                </div></div>
                </div>`;
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getSearchResults.bind(this), 100);
      } else {
        this.searchResults.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchInput.value;
  }

  async getSearchResults() {
    try {
      const response = await axios.get(
        `${shabaaniData.root_url}/wp-json/shabaani/v1/search?query=${this.searchInput.value}`,
      );
      const result = response.data;
      this.searchResults.innerHTML = `
        <div class="row d-flex justify-content-between">        
        <div class="col">
        <div class="d-flex flex-column"> 
        <h3>اخبار و رویدادها</h3>
        <hr>
           ${
             result.newsEvents.length
               ? result.newsEvents
                   .map(
                     (item) =>
                       `<div class="d-flex position-relative bg-light p-3 rounded mb-4">  
               ${
                 item.image
                   ? `<img src="${item.image}" class="flex-shrink-0 ms-3 search__results--image" alt="...">`
                   : ""
               }
                  <div class="d-flex flex-column justify-content-between">
                      <h5 class="mt-0">${item.title}</h5>
                      <p>${item.content}</p>
                      <a href="${
                        item.permalink
                      }" class="stretched-link">ادامه مطلب</a>
                  </div>
                  </div>`,
                   )
                   .join("")
               : "چیزی یافت نشد"
           }        
            </div>  
            </div>

            <div class="col">
            <div class="d-flex flex-column"> 
            <h3>کلاس ها</h3>
            <hr>
           ${
             result.classes.length
               ? result.classes
                   .map(
                     (item) =>
                       `<div class="d-flex position-relative bg-light p-3 rounded mb-4">  
               ${
                 item.image
                   ? `<img src="${item.image}" class="flex-shrink-0 ms-3 search__results--image" alt="...">`
                   : ""
               }
               <div class="d-flex flex-column justify-content-between">
                      <h5 class="mt-0"><a href="${
                        item.permalink
                      }" class="stretched-link">${
                         item.title
                       }</a></h5>                      
                  </div>
                  </div>`,
                   )
                   .join("")
               : "چیزی یافت نشد"
           }   
             </div>
             </div>  
             
             <div class="col">
            <div class="d-flex flex-column"> 
            <h3>دروس</h3>
            <hr>
           ${
             result.programs.length
               ? result.programs
                   .map(
                     (item) =>
                       `<div class="d-flex position-relative bg-light p-3 rounded mb-4">  
               ${
                 item.image
                   ? `<img src="${item.image}" class="flex-shrink-0 ms-3 search__results--image" alt="...">`
                   : ""
               }
               <div class="d-flex flex-column justify-content-between">
                      <h5 class="mt-0"><a href="${
                        item.permalink
                      }" class="stretched-link">${
                         item.title
                       }</a></h5>                      
                  </div>
                  </div>`,
                   )
                   .join("")
               : `
               <p>چیزی یافت نشد.
               <a href="${shabaaniData.root_url}/programs">مشاهده همه دروس</a></p>
               `
           } 
             </div>
             </div>
             
            </div>

            <div class="row d-flex justify-content-between">
            <div class="col">
            <div class="d-flex flex-column"> 
            <h3>اساتید</h3>
            <hr>
           ${
             result.professors.length
               ? result.professors
                   .map(
                     (item) =>
                       `<div class="d-flex position-relative bg-light p-3 rounded mb-4">  
               ${
                 item.image
                   ? `<img src="${item.image}" class="flex-shrink-0 ms-3 search__results--image" alt="...">`
                   : ""
               }
               <div class="d-flex flex-column justify-content-between">
                      <h5 class="mt-0"><a href="${
                        item.permalink
                      }" class="stretched-link">${
                         item.title
                       }</a></h5>                      
                  </div>
                  </div>`,
                   )
                   .join("")
               : "چیزی یافت نشد"
           } 
             </div>
             </div>

             <div class="col">
            <div class="d-flex flex-column"> 
            <h3>پکیج ها</h3>
            <hr>
           ${
             result.packages.length
               ? result.packages
                   .map(
                     (item) =>
                       `<div class="d-flex position-relative bg-light p-3 rounded mb-4">  
               ${
                 item.image
                   ? `<img src="${item.image}" class="flex-shrink-0 ms-3 search__results--image" alt="...">`
                   : ""
               }
               <div class="d-flex flex-column justify-content-between">
                      <h5 class="mt-0"><a href="${
                        item.permalink
                      }" class="stretched-link">${
                         item.title
                       }</a></h5>                      
                  </div>
                  </div>`,
                   )
                   .join("")
               : "چیزی یافت نشد"
           } 
             </div>
             </div>

             <div class="col">
            <div class="d-flex flex-column"> 
            <h3>آزمون ها</h3>
            <hr>
           ${
             result.examinations.length
               ? result.examinations
                   .map(
                     (item) =>
                       `<div class="d-flex position-relative bg-light p-3 rounded mb-4">  
               ${
                 item.image
                   ? `<img src="${item.image}" class="flex-shrink-0 ms-3 search__results--image" alt="...">`
                   : ""
               }
               <div class="d-flex flex-column justify-content-between">
                      <h5 class="mt-0"><a href="${
                        item.permalink
                      }" class="stretched-link">${
                         item.title
                       }</a></h5>                      
                  </div>
                  </div>`,
                   )
                   .join("")
               : "چیزی یافت نشد"
           } 
             </div>
             </div>

            </div>
            `;
      this.isSpinnerVisible = false;
    } catch (error) {
      this.searchResults.innerHTML = `<p>${error}</p>`;
      this.isSpinnerVisible = false;
    }
  }

  keyPressDispatcher(e) {
    if (e.key === "Escape") {
      this.searchOverlay.classList.remove("search__overlay--active");
      this.searchOverlay.classList.add("search__overlay");
      document.querySelector("body").classList.remove("body--noscroll");
    }
  }

  openOverlay() {
    this.searchOverlay.classList.add("search__overlay--active");
    this.searchOverlay.classList.remove("search__overlay");
    setTimeout(() => this.searchInput.focus(), 500);
    this.searchInput.value = "";
    this.searchResults.innerHTML = "";
    document.querySelector("body").classList.add("body--noscroll");
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("search__overlay--active");
    this.searchOverlay.classList.add("search__overlay");
    document.querySelector("body").classList.remove("body--noscroll");
  }

  addSearchHTML() {
    document.querySelector("body").insertAdjacentHTML(
      "beforeend",
      ` 
<div class="search__overlay">
<div class="container-fluid ">
    <div class="fs-2 d-flex p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
        </svg>
        <input class="flex-grow-1 mx-5 border-0 input__style" type="text" placeholder="دنبال چه چیزی هستید؟">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x-square search__button--closer" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
    </div>
</div>
<div class="container">
    <div class="mt-4" id="search__overlay--results">

    </div>
</div>
</div>
    `,
    );
  }
}

export default Search;
