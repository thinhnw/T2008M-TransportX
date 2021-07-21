import React from 'react'
import ReactDOM from 'react-dom'
import { FaMapMarkerAlt, FaPhone } from 'react-icons/fa'
export default function Calculator(props) {
  return (
    <section className="footer text-white">
      <div className="container pb-3">
        <div className="row">
          <div className="col-5">
            <h5>TRANSPORT X JOINT STOCK CORPORATION</h5>
            <p className="mt-3 description">
            Transport Xis a leading provider of domestic and international parcel courier services in Vietnam.
            </p>
            <h5 className="mt-3">
              CONTACT INFO
            </h5>
            <p className="mt-3">
              <FaMapMarkerAlt className="text-danger mr-2" />
              <span className="description">Office: No. 8A Ton That Thuyet, My Dinh, Nam Tu Liem, Hanoi 100000</span>
            </p>              
            <p>
              <FaPhone className="text-danger mr-2" />
              <span className="description">
                Phone: 024 7300 8855
              </span>
            </p>
          </div>
          <div className="col-4 pl-5">
            <h5>ABOUT US</h5>
            <p className="description">
              Introduction
            </p>
            <p className="description">
              Network post offices
            </p>
            <p className="description">
              Frequently Asked Questions (FAQs)
            </p>
          </div>
          <div className="col-3">
            <h5>CUSTOMER SUPPORT</h5>
            <p className="description">User Policy</p>
            <p className="description">Security</p>
            <p className="description">Delivery Policy</p>
            <p className="description">
              Frequently Asked Questions (FAQs)
            </p>
          </div>
        </div>
      </div> 
      <div class="w-100 p-3 text-center bg-secondary description">
        Copyright © Transport X 2021. All rights reserved.
      </div>
    </section>
  )
}