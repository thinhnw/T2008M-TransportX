import React from 'react'
import ReactDOM from 'react-dom'
import {
  Card, CardImg, CardText, CardBody,
  CardTitle, CardSubtitle, Button
} from 'reactstrap';
export default function Features(props) {
  return (
    <section className="features">
      <div className="container">
        <div className="row">
          <div className="col text-center">
            <em>Why should you choose us?</em>
            <h2 className="text-danger font-weight-bold mt-3">OUR STRENGTHS AND ADVANTAGES</h2>
          </div>
        </div>
        <div className="row mt-5 features-1">
          <div className="col-3">
            <div className="card">
              <div>
                <Card>
                  <CardImg top width="100%" src="http://cargo.bold-themes.com/delivery-express/wp-content/uploads/sites/3/2015/10/transport1-1080x540.jpg" alt="Card image cap" />
                  <CardBody>
                    <CardSubtitle tag="em" className="mb-2">Around the world</CardSubtitle>
                    <CardTitle tag="h5" className="text-danger">Shipping</CardTitle>
                    <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
                  </CardBody>
                </Card>
              </div>
            </div>
          </div>
          <div className="col-3">
            <div className="card">
              <div>
                <Card>
                  <CardImg top width="100%" src="http://cargo.bold-themes.com/delivery-express/wp-content/uploads/sites/3/2015/09/shutterstock_202693981-1080x540.jpg" alt="Card image cap" />
                  <CardBody>
                    <CardSubtitle tag="em" className="mb-2">24 hours a day</CardSubtitle>
                    <CardTitle tag="h5" className="text-danger">Courier Delivery</CardTitle>
                    <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
                  </CardBody>
                </Card>
              </div>
            </div>
          </div>
          <div className="col-3">
            <div className="card">
              <div>
                <Card>
                  <CardImg top width="100%" src="/img/shutterstock_252453373-1080x540.jpg" alt="Card image cap" />
                  <CardBody>
                    <CardSubtitle tag="em" className="mb-2">New service</CardSubtitle>
                    <CardTitle tag="h5" className="text-danger">B2B Exchange</CardTitle>
                    <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
                  </CardBody>
                </Card>
              </div>
            </div>
          </div>
          <div className="col-3">
            <div className="card">
              <div>
                <Card>
                  <CardImg top width="100%" src="/img/shutterstock_308425934-1000x540.jpg" alt="Card image cap" />
                  <CardBody>
                    <CardSubtitle tag="em" className="mb-2">7 days a week</CardSubtitle>
                    <CardTitle tag="h5" className="text-danger">Logistics</CardTitle>
                    <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
                  </CardBody>
                </Card>
              </div>
            </div>
          </div>
        </div>
        <div className="row mt-5">
          <div className="col">
            <img src="img/truck-vignette-gray.png" className="mx-auto d-block" alt="" />
          </div>
        </div>  
        <div className="row mt-5 features-2">
          <div className="col-4">
            <div className="card">
              <div>
                <Card>
                  <CardImg top width="100%" src="img/Druga-Pozadina.jpg" alt="Card image cap" />
                  <CardBody>
                    <CardTitle tag="h5" className="">Shipping</CardTitle>
                    <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
                  </CardBody>
                </Card>
              </div>
            </div>
          </div>
          <div className="col-4">
            <div className="card">
              <div>
                <Card>
                  <CardImg top width="100%" src="img/shutterstock_202675450-1080x540.jpg" alt="Card image cap" />
                  <CardBody className="d-flex">
                    <div>
                    </div>
                    <div>
                      <CardTitle tag="h5" className="">Worldwide</CardTitle>
                      <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
                    </div>
                  </CardBody>
                </Card>
              </div>
            </div>
          </div>
          <div className="col-4">
            <div className="card">
              <div>
                <Card>
                  <CardImg top width="100%" src="img/shutterstock_274586306-1080x540.jpg" alt="Card image cap" />
                  <CardBody>
                    <CardTitle tag="h5" className="">Direct client contact</CardTitle>
                    <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
                  </CardBody>
                </Card>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </section>
  )
}