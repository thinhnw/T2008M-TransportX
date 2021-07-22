import React, { useEffect } from 'react'
import ReactDOM from 'react-dom'
import {
  Card, CardImg, CardText, CardBody,
  CardTitle, CardSubtitle, Button
} from 'reactstrap';
export default function Delivery(props) {
  useEffect(() => {
    let address = 'Viet'
    fetch('http://nominatim.openstreetmap.org/search?format=json&q='+address)
      .then(res => res.json())
      .then(res => {
        console.log(res)
      })
  
  }, []);
  return (
    <section class="delivery p-5">
      <form action="">
        <div className="container">
          <div className="row">
            <div className="col-6">
              <div className="card">
                <div className="card-header">
                    Sender
                </div>
                <div className="card-body">
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Name</label>
                    <div className="col-10">
                      <input type="text" className="form-control" />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Email</label>
                    <div className="col-10">
                      <input type="text" className="form-control" />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Phone</label>
                    <div className="col-10">
                      <input type="text" className="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div className="card mt-3">
                <div className="card-header">
                    Receiver
                </div>
                <div className="card-body">
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Name</label>
                    <div className="col-10">
                      <input type="text" className="form-control" />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Email</label>
                    <div className="col-10">
                      <input type="text" className="form-control" />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Phone</label>
                    <div className="col-10">
                      <input type="text" className="form-control" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-6">
              <div className="card">
                <div className="card-header">
                  Parcel Details 
                </div>
                <div className="card-body">
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-3">Weight (gram)</label>
                    <div className="col-9">
                      <input type="text" className="form-control" />
                    </div>
                  </div> 
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-3 pr-0">Dimension (cm)</label>
                    <div className="col-3 pr-0">
                      <input type="text" className="form-control" placeholder="Height" />
                    </div>
                    <div className="col-3 pr-0">
                      <input type="text" className="form-control" placeholder="Width" />
                    </div>
                    <div className="col-3 ">
                      <input type="text" className="form-control" placeholder="Length" />
                    </div>
                  </div> 
                </div>
              </div>
              <div className="card mt-3">
                <div className="card-header">
                  Service
                </div>
                <div className="card-body">
                  <div className="form-group">
                    <label htmlFor="" class="form-label">Delivery Type</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="driver" name="employee_type" value="driver" className="form-check-input"/>
                        <label for="html" class="form-check-label">Delivery</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="customer" name="employee_type" value="customer" className="form-check-input" />
                        <label for="css" className="form-check-label">Pickup</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      
    </section>
  )
}