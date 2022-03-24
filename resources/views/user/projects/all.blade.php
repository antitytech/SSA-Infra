@extends('user.layout')
@section('title')
    Projects
@endsection
@section('content')
    <div class="row" style="margin-top: 25px">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">My Projects</h4>
                    <div class="row">
                        @isset($platform)
                            @foreach ($platform as $platform)
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="card cardsss">
                                        <img class="Platform_image" src="{{ asset('/images/' . $platform->Image)  }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $platform->ProjectName }}</h5>
                                            <p class="card-text">Platform has been modified by
                                                <b>{{ $platform->name ?? '' }}</b> on {{ $platform->created_at ?? 'No Data' }}
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="font-size: 30px"><b>{{ $platform->ProjectName ?? 'No Data' }} Project Overview</b>  </p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <div class="col-6">
                                                    <li class="list-group-item">Project Name: <b>{{ $platform->ProjectName ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item" >Project Type: <span style="color: #de9114"><b>{{ $platform->ProjectType ?? 'No Data' }}</b></span></li>
                                                    <li class="list-group-item">Off-taker identified: <b>{{ $platform->Offtaker ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">PPA status: <b>{{ $platform->PPA_Status ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Platform: <b>{{ $platform->ChoosePlatform ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Project is or will be connected to grid: <b>{{ $platform->grid ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Date of commissioning / grid connection (COD): <b>{{ $platform->DateCommissioning ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Evacuation of power confirmed by grid operator: <b>{{ $platform->Evacuation ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Project site identified: <b>{{ $platform->SiteIdentified ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Project stage: <b>{{ $platform->ProjectStage ?? 'No Data' }}</b></li>
                                                </div>
                                                <div class="col-6">
                                                    <li class="list-group-item">Country: <b>{{ $platform->Country ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item" >Region: <b>{{ $platform->Region ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">City: <b>{{ $platform->City ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Street: <b>{{ $platform->Street ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Postal code: <b>{{ $platform->PostalCode ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Developer - Investor relation: <b>{{ $platform->Developer ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">EPC contractor(s) identified: <b>{{ $platform->EPC_Contractor ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">EPC Contractor Structure: <b>{{ $platform->EPC_Structure ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">Current or proposed ownership structure: <b>{{ $platform->OwnershipStructure ?? 'No Data' }}</b></li>
                                                    <li class="list-group-item">`Special Purpose Vehicle` already set up: <b>{{ $platform->SpecialPurposeVehicle ?? 'No Data' }}</b></li>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                        @isset($teaser)
                        @foreach ($teaser as $platform)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="card cardsss" style="width: 45rem;">
                                    <div class="card-body">
                                        <p class="card-text" style="font-size: 30px"><b>{{ $platform->ProjectName ?? 'No Data' }} Project Teaser</b>  </p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <div class="row">
                                            <div class="col-12">
                                                <li class="list-group-item">Opportunity Brief: <b>{{ $platform->OpportunityBrief ?? 'No Data' }}</b></li>
                                                <li class="list-group-item" >Market landscape: <b>{{ $platform->MarketLandscape ?? 'No Data' }}</b></span></li>
                                                <li class="list-group-item" >About the Off-taker: <b>{{ $platform->TeaserOffTaker ?? 'No Data' }}</b></span></li>

                                                <li class="list-group-item">Reason to invest: <b>{{ $platform->ReasonIinvest ?? 'No Data' }}</b></li>
                                                <li class="list-group-item" >About the Project Sponsor: <b>{{ $platform->AboutSponsor ?? 'No Data' }}</b></li>
                                              </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    @isset($sites)
                    @foreach ($sites as $platform)
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="card cardsss" style="width: 45rem;">

                                <div class="card-body">
                                    <p class="card-text" style="font-size: 30px"><b>{{ $platform->ProjectName ?? 'No Data' }} Project Sites</b>  </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="container">
                                            <div class="mapouter">
                                                <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no"
                                                        marginheight="0" marginwidth="0"
                                                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{ $platform->Address }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                                        href="https://kokagames.com/">Koka Games</a></div>
                                                <style>
                                                    .mapouter {
                                                        position: relative;
                                                        text-align: right;
                                                        width: 600px;
                                                        height: 250px;
                                                    }

                                                    .gmap_canvas {
                                                        overflow: hidden;
                                                        background: none !important;
                                                        width: 600px;
                                                        height: 250px;
                                                    }

                                                    .gmap_iframe {
                                                        width: 600px !important;
                                                        height: 250px !important;
                                                    }

                                                    @media (min-width: 320px) and (max-width: 479px) {
                                                        .mapouter {
                                                            position: relative;
                                                            text-align: right;
                                                            width: 290px !important;
                                                            height: 250px;
                                                        }

                                                        .gmap_canvas {
                                                            overflow: hidden;
                                                            background: none !important;
                                                            width: 290px !important;
                                                            height: 250px;
                                                        }

                                                        .gmap_iframe {
                                                            width: 290px !important;
                                                            height: 250px !important;
                                                        }
                                                    }
                                                    @media (min-width: 480px) and (max-width: 768px) {
                                                        .mapouter {
                                                            position: relative;
                                                            text-align: right;
                                                            width: 400px !important;
                                                            height: 250px;
                                                        }

                                                        .gmap_canvas {
                                                            overflow: hidden;
                                                            background: none !important;
                                                            width: 400px !important;
                                                            height: 250px;
                                                        }

                                                        .gmap_iframe {
                                                            width: 400px !important;
                                                            height: 250px !important;
                                                        }
                                                    }
                                                </style>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-6">
                                            <li class="list-group-item">Site area: <b>{{ $platform->SiteArea ?? 'No Data' }}</b></li>
                                            <li class="list-group-item" >Site area unit: <b>{{ $platform->SiteUnit ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Site main usage: <b>{{ $platform->SiteMainUsage ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Contract for site signed: <b>{{ $platform->ContractSigned ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Site owner is one of the PPA off-taker: <b>{{ $platform->SiteOwnerPPAoff_taker ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Site owner payment: <b>{{ $platform->SiteOwnerPayment ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Site contract type: <b>{{ $platform->SiteContractType ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Site Address: <b>{{ $platform->Address ?? 'No Data' }}</b></li>
                                        </div>
                                        <div class="col-6">
                                            <li class="list-group-item">Site rent/lease cost per year: <b>{{ $platform->SiteCostPerYear ?? 'No Data' }}</b></li>
                                            <li class="list-group-item" >Site rent/lease cost per year Currency: <b>{{ $platform->SiteCurrency ?? 'No Data' }}</b></li>
                                            <li class="list-group-item" >Duration lease (years): <b>{{ $platform->DurationLease ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Site access/easement: <b>{{ $platform->SiteAccess ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Site accessible by truck: <b>{{ $platform->SiteAccessibleTruck ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Comments about logistics plan, distance from port of delivery: <b>{{ $platform->logistics ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Road Survey Completed: <b>{{ $platform->RoadSurvey ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Comments about the site: <b>{{ $platform->CommentsSite ?? 'No Data' }}</b></li>
                                           </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @isset($Maintenance)
                    @foreach ($Maintenance as $platform)
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="card cardsss" style="width: 45rem;">

                                <div class="card-body">
                                    <p class="card-text" style="font-size: 30px"><b>{{ $platform->ProjectName ?? 'No Data' }} Project Operations & Maintenance</b>  </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <div class="row">
                                        <div class="col-6">
                                            <li class="list-group-item">Maintenance yearly costs: <b>{{ $platform->MaintenanceYearlyCosts ?? 'No Data' }}</b></li>
                                            <li class="list-group-item" >General & Overhead yearly costs: <b>{{ $platform->OverheadYearlyCosts ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">O&M contract in place: <b>{{ $platform->OM_ContractInPlace ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">O&M yearly costs: <b>{{ $platform->OM_YearlyCosts ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">O&M yearly costs Currency: <b>{{ $platform->OM_Currency ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Comments about the O&M Costs: <b>{{ $platform->CommentsOMCosts ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">O&M escalation rate (% per year): <b>{{ $platform->OM_EscalationRate ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">O&M contractor: <b>{{ $platform->OM_Contractor ?? 'No Data' }}</b></li>
                                        </div>
                                        <div class="col-6">
                                            <li class="list-group-item">Operational risks: <b>{{ $platform->OperationalRisks ?? 'No Data' }}</b></li>
                                            <li class="list-group-item" >Third party liability risks: <b>{{ $platform->ThirdParty ?? 'No Data' }}</b></li>
                                            <li class="list-group-item" >Yield/Performances risks: <b>{{ $platform->Yield_PerformancesRisks ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Insurance costs: <b>{{ $platform->InsuranceCosts ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Insurance costs Currency: <b>{{ $platform->InsuranceCurrency ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Comments about insurance costs: <b>{{ $platform->CommentsAboutInsuranceCosts ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Insurer name(s): <b>{{ $platform->InsurerName ?? 'No Data' }}</b></li>
                                            <li class="list-group-item">Comments regarding the O&M and insurance: <b>{{ $platform->CommentsRegardingOM_Insurance ?? 'No Data' }}</b></li>
                                           </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @isset($Contracts)
                @foreach ($Contracts as $platform)
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="card cardsss" style="width: 45rem;">

                            <div class="card-body">
                                <p class="card-text" style="font-size: 30px"><b>{{ $platform->ProjectName ?? 'No Data' }} Project Contracts</b>  </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <div class="row">
                                    <div class="col-6">
                                        <li class="list-group-item">Building permits available: <b>{{ $platform->BuildingPermitsAvailable ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Environmental permits available: <b>{{ $platform->EnvironmentalPermitsAvailable ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Interconnection permits available: <b>{{ $platform->InterconnectionPermitsAvailable ?? 'No Data' }}</b></li>

                                        <li class="list-group-item">Project developer is the EPC: <b>{{ $platform->ProjectDeveloperEPC ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">EPC contract(s) status: <b>{{ $platform->EPC_Contract ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Procurement contractor: <b>{{ $platform->ProcurementContractor ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Engineering contractor: <b>{{ $platform->EngineeringContractor ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Construction contractor: <b>{{ $platform->ConstructionContractor ?? 'No Data' }}</b></li>
                                    </div>
                                    <div class="col-6">
                                        <li class="list-group-item">General risks: <b>{{ $platform->GeneralRisks ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Transit risks: <b>{{ $platform->TransitRisks ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Construction/Erection risks: <b>{{ $platform->Construction_ErectionRisks ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Third party liability risks: <b>{{ $platform->ThirdPartyLiability ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Professional Indemnity/Error & Omission risks: <b>{{ $platform->ProfessionalIndemnity ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Insurance costs: <b>{{ $platform->InsuranceCosts ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Insurance costs currency: <b>{{ $platform->InsuranceCostsCurrency ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Comment about insurance: <b>{{ $platform->CommentAboutInsurance ?? 'No Data' }}</b></li>
                                       </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endisset
            @isset($Taxes)
                @foreach ($Taxes as $platform)
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="card cardsss" style="width: 45rem;">

                            <div class="card-body">
                                <p class="card-text" style="font-size: 30px"><b>{{ $platform->ProjectName ?? 'No Data' }} Project Taxes</b>  </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <div class="row">
                                    <div class="col-6">
                                        <li class="list-group-item">Corporate income tax (%): <b>{{ $platform->CorporateIncomeTax ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Withholding tax (%): <b>{{ $platform->WithholdingTax ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">VAT/GST on revenue (%): <b>{{ $platform->VAT_GST_Revenue ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">VAT/GST on expense (%): <b>{{ $platform->VAT_GST_Expense ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Import duties & VAT (%): <b>{{ $platform->ImportDutiesVAT ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Other tax incentives description: <b>{{ $platform->OtherTax ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Comments regarding the taxes: <b>{{ $platform->TaxesComments ?? 'No Data' }}</b></li>
                                    </div>
                                    <div class="col-6">
                                        <li class="list-group-item">Schedule: <b>{{ $platform->Schedule ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Depreciation term: <b>{{ $platform->DepreciationTerm ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Depreciation term (% of years): <b>{{ $platform->DepreciationTermYear ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Initial allowance %: <b>{{ $platform->InitialAllowance ?? 'No Data' }}</b></li>
                                       </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endisset
            @isset($Shareholders)
                @foreach ($Shareholders as $platform)
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="card cardsss" style="width: 45rem;">

                            <div class="card-body">
                                <p class="card-text" style="font-size: 30px"><b>{{ $platform->ProjectName ?? 'No Data' }} Project Equity Shareholders</b>  </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <div class="row">
                                    <div class="col-12">
                                        <li class="list-group-item">Shareholder full name: <b>{{ $platform->ShareholderFullName ?? 'No Data' }}</b></li>
                                        <li class="list-group-item" >Shareholding (%): <b>{{ $platform->Shareholding ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Ultimate beneficiary name(s): <b>{{ $platform->UltimateBeneficiaryName ?? 'No Data' }}</b></li>
                                        <li class="list-group-item">Comments <b>{{ $platform->ShareholdersComments ?? 'No Data' }}</b></li>
                                   </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


