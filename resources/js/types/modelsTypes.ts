export type UserType = {
    name : string,
    id : number;
    email : string,

}

export type DepartmentType = {
    name : string,
    slug : string,
    departement_chief : UserType
}

export type FacultyType = {
    name : string,
    slug : string,
    director : UserType
    departments : DepartmentType[]
}
