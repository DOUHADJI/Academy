/* User EndPoints */
export const UPDATE_USER = (id : number | string) => `/api/users/${id}`
export const GET_TEACHERS = "/api/users/teachers/get-all"


//  Faculties endpoints
export const GET_FACULTIES = '/api/faculties';
export const CREATE_FACULTY = '/api/faculties';
export const GET_FACULTY = (name) => `/api/faculties/${name}`;
export const UPDATE_FACULTY = (id) => `/api/faculties/${id}`;
export const DELETE_FACULTY = (id) => `/api/faculties/${id}`;
