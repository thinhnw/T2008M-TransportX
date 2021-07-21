import React, { useState } from 'react'
import ReactDOM from 'react-dom'
import { Button, Form, FormGroup, Label, Input, CustomInput, FormText, Col, Tooltip } from 'reactstrap';
import RangeSlider from 'react-bootstrap-range-slider';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import { FaArrowRight, FaCalculator } from 'react-icons/fa'

export default function Calculator(props) {
  const [tooltipOpen, setTooltipOpen] = useState(false);
  const toggle = () => setTooltipOpen(!tooltipOpen);
  const [ value, setValue ] = useState(0); 

  return (
    <section className="calculator">
      <div className="container">
        <div className="row">
          <div className="col">
            <em>Not sure how much would it cost you?</em>
            <h2 className="mt-3">USE OUR CALCULATOR TO FIND OUT!</h2>
          </div>
        </div>
        <div className="row mt-5">
          <div className="col-8">
            <Form>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Height (cm)</Label>
                <Col sm={10}>
                  <Input type="number" min="1" name="height" id="height" placeholder="Enter the parcel's height" />
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Width (cm)</Label>
                <Col sm={10}>
                  <Input type="number" min="1" name="width" id="width" placeholder="Enter the parcel's width" />
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Length (cm)</Label>
                <Col sm={10}>
                  <Input type="number" min="1" name="length" id="length" placeholder="Enter the parcel's length" />
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Weight (gram)</Label>
                <Col sm={10}>
                  <Input type="number" min="1" name="weight" id="weight" placeholder="Enter the parcel's weight" />
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Distance (km)</Label>
                <Col sm={8} >
                <RangeSlider
                  value={value}
                  onChange={changeEvent => setValue(changeEvent.target.value)}
                  max="1000"
                />
                </Col>
                <Col sm={2}>
                  <Input value={value + ' km'}/>
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Type of Service</Label>
                <Col sm={10}>
                  <Input type="select" name="weight" id="weight" placeholder="Enter the parcel's weight">
                    <option value="0" selected>Pick your service</option>
                    <option value="1">Door to door delivery</option>
                    <option value="2">Pickup at one of our post offices</option>
                  </Input>
                </Col>
              </FormGroup>
            </Form>
          </div>
          <div className="col-4">
            <img src="/img/mercedes.png" alt="" style={{ display: 'block', width: '100%', position: 'relative', transform: 'translateY(-300px)'}}/>
            <Link to="/" className="btn btn-danger w-100 p-3" style={{ transform: 'translateY(-100px)'}}>
              Calculate Shipping Cost
              <FaCalculator className="ml-3" />
            </Link>
          </div>
        </div>
        <div className="row mt-4 text-white">
          <div className="col-6 pr-0">
            <div className="bg-danger p-2 text-white text-right">
              <span className="pr-2">
                Total
              </span>
            </div>
          </div>
          <div className="col-2 pl-0">
            <div className="bg-warning text-center p-2">
              { 0.00 }
              VND
            </div>
          </div>
          <div className="col-3">
          </div>
        </div>
      </div> 
    </section>
  )
}
