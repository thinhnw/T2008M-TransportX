import React from 'react'
import ReactDOM from 'react-dom'
export default function Calculator(props) {
  return (
    <section className="footer text-white">
      <div className="container">
        <div className="row">
          <div className="col-4">
            <h6>TRANSPORT X JOINT STOCK CORPORATION</h6>
            <p className="mt-3">
            Transport Xis a leading provider of domestic and international parcel courier services in Vietnam.
            </p>
            <h6 className="mt-3">
              CONTACT INFO
            </h6>
            <hr />
            <p>Office:</p>              
            <p>No. 8A Ton That Thuyet, My Dinh, Nam Tu Liem, Hanoi 100000</p>
            <p>
              Phone: 024 7300 8855
            </p>
          </div>
          <div className="col-4">
            <h6>ABOUT US</h6>
            <p>
              Introduction
            </p>
            <p>
              Network post offices
            </p>
            <p>
              Frequently Asked Questions (FAQs)
            </p>
          </div>
          <div className="col-4">
            <h6>CUSTOMER SUPPORT</h6>
            <p>User Policy</p>
            <p>Security</p>
            <p>Delivery Policy</p>
            <p>
              Frequently Asked Questions (FAQs)
            </p>
          </div>
        </div>
      </div> 
    </section>
  )
}