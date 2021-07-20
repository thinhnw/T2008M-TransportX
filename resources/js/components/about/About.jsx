import React from 'react'
import ReactDOM from 'react-dom'
import {Card, CardBody, CardSubtitle, CardText, CardTitle} from "reactstrap";
export default function About(props) {
    return (
        <section className="about">
            <div className="container">
                <div className="row">
                    <div className="col text-center">
                        <em>Donec vel accumsan velit.</em>
                        <h2 className="text-danger font-weight-bold mt-2">MANAGING DIRECTORS</h2>
                    </div>
                </div>
                <div className="row mt-5 abouts">
                    <div className="col-3">
                        <div className="card">
                            <div>
                                <Card>
                                    <CardBody>
                                        <img width="100%"src="img/4-600x540.jpg" alt="Port"/>
                                        <CardSubtitle tag="em" className="mb-2">Founder & CEO, DE LLC</CardSubtitle>
                                        <CardTitle tag="h5" className="text-danger">Mike Smart</CardTitle>
                                        <CardText>Morbi consequat, felis vitae dictum varius, purus mi porta urna, sed dictum dolor arcu id massa. Phasellus eu tortor quis massa tincidunt pharetra suspendisse.</CardText>
                                    </CardBody>
                                </Card>
                            </div>
                        </div>
                    </div>
                    <div className="col-3">
                        <div className="card">
                            <div>
                                <Card>
                                    <CardBody>
                                        <img width="100%"src="img/5-600x540.jpg" alt="Port"/>
                                        <CardSubtitle tag="em" className="mb-2">Managing Director, De LLC</CardSubtitle>
                                        <CardTitle tag="h5" className="text-danger">Matt McGregor</CardTitle>
                                        <CardText>Mauris bibendum consectetur dui, id tristique leo. Purus mi porta urna, sed dictum dolor arcu id massa. Phasellus eu tortor quis massa tincidunt pharetra suspendisse.</CardText>
                                    </CardBody>
                                </Card>
                            </div>
                        </div>
                    </div>
                    <div className="col-3">
                        <div className="card">
                            <div>
                                <Card>
                                    <CardBody>
                                        <img width="100%"src="img/1-600x540.jpg" alt="Port"/>
                                        <CardSubtitle tag="em" className="mb-2">HR Manager, DE LLC</CardSubtitle>
                                        <CardTitle tag="h5" className="text-danger">Susan Hamilton</CardTitle>
                                        <CardText> Phasellus eu tortor quis massa tincidunt pharetra. Mauris bibendum consectetur dui, id tristique leo. Morbi consequat, felis vitae dictum varius, purus mi porta urna.</CardText>
                                    </CardBody>
                                </Card>
                            </div>
                        </div>
                    </div>
                    <div className="col-3">
                        <div className="card">
                            <div>
                                <Card>
                                    <CardBody>
                                        <img width="100%"src="img/31-600x540.jpg" alt="Port"/>
                                        <CardSubtitle tag="em" className="mb-2">Logistics Manager, DE LLC</CardSubtitle>
                                        <CardTitle tag="h5" className="text-danger">Robert Jackson</CardTitle>
                                        <CardText>Phasellus eu tortor quis massa tincidunt pharetra. Suspendisse posuere blandit mattis. Mauris bibendum consectetur dui, id tristique leo. Morbi consequat, felis.</CardText>
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
