import React, { useState } from 'react'
import ReactDOM from 'react-dom'
import { Button, Form, FormGroup, Label, Input, CustomInput, FormText, Col, Tooltip } from 'reactstrap';
import RangeSlider from 'react-bootstrap-range-slider';


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
          <div className="col-9">
            <Form>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Height (cm)</Label>
                <Col sm={10}>
                  <Input type="number" name="height" id="height" placeholder="Enter the parcel's height" />
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Width (cm)</Label>
                <Col sm={10}>
                  <Input type="number" name="width" id="width" placeholder="Enter the parcel's width" />
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Length (cm)</Label>
                <Col sm={10}>
                  <Input type="number" name="length" id="length" placeholder="Enter the parcel's length" />
                </Col>
              </FormGroup>
              <FormGroup row className="align-items-center mb-4">
                <Label sm={2}>Weight (gram)</Label>
                <Col sm={10}>
                  <Input type="number" name="weight" id="weight" placeholder="Enter the parcel's weight" />
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
            </Form>
          </div>
        </div>
      </div> 
    </section>
  )
}
