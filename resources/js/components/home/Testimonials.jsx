import React from 'react'
import ReactDOM from 'react-dom'
export default function Testimonials(props) {
  return (
    <section className="testimonials">
      <div className="container">
        <div className="row">
          <div className="col text-center">
            <h2>CLIENTS AND TESTIMONIALS</h2>
          </div>
        </div>
        <div className="row">
          <div className="col-4">
            
            <div class="wrapper">
              <div class="btText">
                <blockquote>
                  <p>Pellentesque at cursus libero. Donec non varius ligula, id gravida velit. Sed id scelerisque nulla.</p>
                </blockquote>
              </div>
              <div class="bpgPhoto btTextCenter out-right">
                <div class="btImage">
                  <img src="http://cargo.bold-themes.com/delivery-express/wp-content/uploads/sites/3/2015/09/sign_1.png" alt="" />
                </div>
              </div>
              <header class="header btClear small btTextRight btAccentDash btRegularTitle">
                <p class="btSuperTitle">John Smith</p>
                <p class="btSubTitle">CTO of KLM</p>
              </header>
            </div>
          </div>
        </div>
      </div> 
    </section>
  )
}