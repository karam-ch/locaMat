import { buildHooks } from '@reduxjs/toolkit/dist/query/react/buildHooks';
import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';
import axios, { AxiosError } from 'axios';

const baseUrl = 'http://localhost:8000';

const axiosBaseQuery = ({ baseUrl }) => async ({ url, method, data, params }) => {
    try {
        const result = await axios({ url: baseUrl + url, method, data, params });
        return { data: result.data };
    } catch (axiosError) {
        let err = axiosError as AxiosError;
        return {
            error: {
                status: err.response?.status,
                data: err.response?.data || err.message,
            },
        };
    }
};

export const api = createApi({
    baseQuery: axiosBaseQuery({ baseUrl }),
    endpoints: (build) => ({
        loginUser: build.mutation({
            query: (credentials) => ({
                url: '/login',
                method: 'post',
                data: credentials,
            }),
        }),
        listDevices: build.query({
            query: () => ({
                url: '/device/list',
                method: 'get',
            }),
        }),
        addDevice: build.mutation({
            query: (deviceData) => ({
                url: '/device/add',
                method: 'POST',
                deviceData,
            })
        }),
        editDevice: build.mutation({
            query: ({ id, deviceData }) => ({
                url: `/device/${id}/edit`,
                method: 'post',
                data: deviceData,
            }),
        }),
        deleteDevice: build.mutation({
            query: (id) => ({
                url: `/device/${id}/delete`,
                method: 'post',
            }),
        }),
        borrowDevice: build.mutation({
            query: (id) => ({
                url: `/device/${id}/borrow`,
                method: 'post',
            }),
        }),
        returnDevice: build.mutation({
            query: (id) => ({
                url: `/device/${id}/return`,
                method: 'post',
            }),
        }),
        showDevice: build.query({
            query: (id) => ({
                url: `/device/${id}`,
                method: 'get',
            }),
        }),
        addUser: build.mutation({
            query: (userData) => ({
                url: '/user/add',
                method: 'post',
                data: userData,
            }),
        }),
    }),
});

export const {
    useLoginUserMutation,
    useListDevicesQuery,
    useAddDeviceMutation,
    useEditDeviceMutation,
    useDeleteDeviceMutation,
    useBorrowDeviceMutation,
    useReturnDeviceMutation,
    useShowDeviceQuery,
    useAddUserMutation,
} = api;
